const services = [
	{ id: "kilimani-bedsitter", title: "Bright bedsitter near Yaya", category: "Bedsitter", categoryLabel: "Bedsitter · Kilimani", description: "A furnished, light-filled bedsitter close to shops and matatu routes.", icon: "⌂", iconClass: "icon-lilac", location: "Kilimani · near Yaya Centre", price: 18000, slots: ["9:00 AM", "10:30 AM", "12:00 PM", "2:00 PM", "3:30 PM"] },
	{ id: "kasarani-one-bedroom", title: "One-bedroom apartment", category: "1 bedroom", categoryLabel: "1 bedroom · Kasarani", description: "Secure apartment with a balcony and convenient access to Thika Road.", icon: "⌂", iconClass: "icon-peach", location: "Kasarani · near Seasons", price: 25000, slots: ["9:30 AM", "11:00 AM", "1:00 PM", "2:30 PM"] },
	{ id: "westlands-studio", title: "Compact studio apartment", category: "Bedsitter", categoryLabel: "Studio · Westlands", description: "A tidy studio close to Westlands offices, cafés, and public transport.", icon: "⌂", iconClass: "icon-mint", location: "Westlands · near Sarit Centre", price: 32000, slots: ["10:00 AM", "11:30 AM", "1:30 PM", "3:00 PM"] },
	{ id: "rongai-two-bedroom", title: "Spacious two-bedroom", category: "2 bedroom", categoryLabel: "2 bedroom · Rongai", description: "Room to share, with secure parking and shops in the neighbourhood.", icon: "⌂", iconClass: "icon-blue", location: "Rongai · near Maasai Mall", price: 28000, slots: ["9:00 AM", "11:00 AM", "1:00 PM", "3:00 PM"] },
	{ id: "south-b-bedsitter", title: "Affordable bedsitter", category: "Bedsitter", categoryLabel: "Bedsitter · South B", description: "A practical, well-connected home close to local shops and services.", icon: "⌂", iconClass: "icon-yellow", location: "South B · near Bellevue", price: 16000, slots: ["10:30 AM", "12:00 PM", "2:00 PM", "4:00 PM"] }
];

const STORAGE_KEY = "nyumbalink-viewings-v1";
const serviceGrid = document.querySelector("#service-grid");
const emptyState = document.querySelector("#empty-state");
const searchInput = document.querySelector("#service-search");
const categoryButtons = [...document.querySelectorAll(".category-chip")];
const modal = document.querySelector("#booking-modal");
const bookingForm = document.querySelector("#booking-form");
const viewingDateInput = document.querySelector("#viewing-date");
const toast = document.querySelector("#toast");

let activeService = null;
let selectedCategory = "All";
let toastTimeout;

function localDateKey(date) {
	const year = date.getFullYear();
	const month = String(date.getMonth() + 1).padStart(2, "0");
	const day = String(date.getDate()).padStart(2, "0");
	return `${year}-${month}-${day}`;
}

function formatLongDate(date) {
	return new Intl.DateTimeFormat("en-US", { weekday: "long", month: "long", day: "numeric" }).format(date);
}

function getBookings() {
	try {
		const stored = JSON.parse(localStorage.getItem(STORAGE_KEY) || "[]");
		return Array.isArray(stored) ? stored : [];
	} catch (error) {
		console.warn("Could not read saved bookings.", error);
		return [];
	}
}

function saveBookings(bookings) {
	localStorage.setItem(STORAGE_KEY, JSON.stringify(bookings));
}

function reservedSlots(serviceId, date) {
	return getBookings().filter((booking) => booking.serviceId === serviceId && booking.date === date).map((booking) => booking.time);
}

function renderServices() {
	const query = searchInput.value.trim().toLowerCase();
	const filtered = services.filter((service) => {
		const matchesCategory = selectedCategory === "All" || service.category === selectedCategory;
		const matchesSearch = `${service.title} ${service.description} ${service.categoryLabel} ${service.location}`.toLowerCase().includes(query);
		return matchesCategory && matchesSearch;
	});

	serviceGrid.replaceChildren();
	emptyState.classList.toggle("hidden", filtered.length > 0);
	document.querySelector("#all-service-count").textContent = String(services.length).padStart(2, "0");

	filtered.forEach((service) => {
		const card = document.createElement("article");
		card.className = `service-card${service.id === "kilimani-bedsitter" ? " featured-bedsitter" : ""}`;
		card.innerHTML = `
			<div class="service-card-top"><span class="service-icon ${service.iconClass}" aria-hidden="true">${service.icon}</span><span class="service-category">${service.categoryLabel}</span></div>
			<h3>${service.title}</h3>
			<p>${service.description}</p>
			<div class="service-meta"><span class="slots-label"><strong>KSh ${service.price.toLocaleString("en-KE")}</strong> / month</span><button class="reserve-button" type="button">Book viewing <span aria-hidden="true">→</span></button></div>`;
		card.querySelector(".reserve-button").addEventListener("click", () => openBooking(service));
		serviceGrid.append(card);
	});
}

function renderViewingTimes() {
	if (!activeService || !viewingDateInput.value) return;
	const dateKey = viewingDateInput.value;
	const date = new Date(`${dateKey}T12:00:00`);
	const taken = reservedSlots(activeService.id, dateKey);
	const availableSlots = activeService.slots.filter((slot) => !taken.includes(slot));
	const timeControl = document.createElement("div");
	timeControl.className = "time-slots";
	timeControl.setAttribute("role", "group");
	timeControl.setAttribute("aria-label", "Choose a viewing time");
	if (availableSlots.length) {
		availableSlots.forEach((time, index) => {
			const button = document.createElement("button");
			button.type = "button";
			button.className = `time-slot${index === 0 ? " selected" : ""}`;
			button.textContent = time;
			button.setAttribute("aria-pressed", String(index === 0));
			button.addEventListener("click", () => {
				timeControl.querySelectorAll(".time-slot").forEach((slot) => {
					slot.classList.remove("selected");
					slot.setAttribute("aria-pressed", "false");
				});
				button.classList.add("selected");
				button.setAttribute("aria-pressed", "true");
				document.querySelector("#booking-time").value = time;
			});
			timeControl.append(button);
		});
	} else {
		timeControl.textContent = "No viewing times are available on this date. Please choose another date.";
	}
	const existing = bookingForm.querySelector(".time-slots");
	if (existing) existing.replaceWith(timeControl);
	else document.querySelector("#booking-summary").before(timeControl);
	document.querySelector("#booking-date").value = dateKey;
	document.querySelector("#booking-time").value = availableSlots[0] || "";
	document.querySelector("#booking-summary").innerHTML = `<span>${formatLongDate(date)}</span><strong>${availableSlots.length ? `${availableSlots.length} viewing times` : "No times available"}</strong>`;
}

function openBooking(service) {
	activeService = service;
	const todayKey = localDateKey(new Date());
	viewingDateInput.min = todayKey;
	viewingDateInput.value = todayKey;
	document.querySelector("#booking-service-id").value = service.id;
	document.querySelector("#modal-icon").textContent = service.icon;
	document.querySelector("#modal-service").textContent = `${service.title} · ${service.location}`;
	renderViewingTimes();
	modal.classList.remove("hidden");
	document.body.classList.add("modal-open");
	viewingDateInput.focus();
}

function closeModal() {
	modal.classList.add("hidden");
	document.body.classList.remove("modal-open");
}

function renderBookings() {
	const bookings = getBookings().sort((a, b) => `${a.date} ${a.time}`.localeCompare(`${b.date} ${b.time}`));
	const list = document.querySelector("#upcoming-list");
	const todayKey = localDateKey(new Date());
	const upcoming = bookings.filter((booking) => booking.date >= todayKey);
	list.replaceChildren();
	document.querySelector("#booking-count").textContent = String(upcoming.length);
	document.querySelector("#upcoming-total").textContent = `${upcoming.length} ${upcoming.length === 1 ? "booking" : "bookings"}`;
	document.querySelector("#upcoming-empty").classList.toggle("hidden", upcoming.length > 0);

	upcoming.forEach((booking) => {
		const service = services.find((item) => item.id === booking.serviceId);
		if (!service) return;
		const date = new Date(`${booking.date}T12:00:00`);
		const card = document.createElement("article");
		card.className = "upcoming-card";
		card.innerHTML = `<div class="upcoming-date"><span>${new Intl.DateTimeFormat("en-US", { month: "short" }).format(date)}</span><strong>${date.getDate()}</strong></div><div class="upcoming-detail"><strong>${service.title}</strong><span>${booking.time} · ${service.location}</span></div><button class="cancel-button" type="button" aria-label="Cancel booking for ${service.title}">Cancel</button>`;
		card.querySelector(".cancel-button").addEventListener("click", () => {
			saveBookings(getBookings().filter((item) => item.id !== booking.id));
			renderBookings();
			renderServices();
			showToast("Booking cancelled.");
		});
		list.append(card);
	});
}

function showToast(message) {
	toast.textContent = message;
	toast.classList.add("visible");
	clearTimeout(toastTimeout);
	toastTimeout = setTimeout(() => toast.classList.remove("visible"), 3000);
}

categoryButtons.forEach((button) => {
	button.addEventListener("click", () => {
		selectedCategory = button.dataset.category;
		categoryButtons.forEach((item) => item.classList.toggle("selected", item === button));
		renderServices();
	});
});

searchInput.addEventListener("input", renderServices);
viewingDateInput.addEventListener("change", renderViewingTimes);
document.querySelector("#modal-close").addEventListener("click", closeModal);
modal.addEventListener("click", (event) => { if (event.target === modal) closeModal(); });
document.addEventListener("keydown", (event) => {
	if (event.key === "Escape" && !modal.classList.contains("hidden")) closeModal();
	if (event.key === "/" && document.activeElement !== searchInput && !["INPUT", "TEXTAREA"].includes(document.activeElement.tagName)) {
		event.preventDefault();
		searchInput.focus();
	}
});

bookingForm.addEventListener("submit", (event) => {
	event.preventDefault();
	if (!bookingForm.reportValidity()) return;
	const serviceId = document.querySelector("#booking-service-id").value;
	const date = document.querySelector("#booking-date").value;
	const time = document.querySelector("#booking-time").value;
	const service = services.find((item) => item.id === serviceId);
	if (!time) {
		showToast("Choose an available viewing time before continuing.");
		return;
	}
	const bookings = getBookings();
	if (bookings.some((booking) => booking.serviceId === serviceId && booking.date === date && booking.time === time)) {
		closeModal();
		renderServices();
		showToast("That viewing time was just taken. Please choose another.");
		return;
	}

	bookings.push({
		id: `${Date.now()}-${Math.random().toString(16).slice(2)}`,
		serviceId,
		date,
		time,
		name: document.querySelector("#student-name").value.trim(),
		email: document.querySelector("#student-email").value.trim()
	});
	saveBookings(bookings);
	bookingForm.reset();
	closeModal();
	renderBookings();
	renderServices();
	showToast(`Viewing request saved for ${service.title}.`);
	document.querySelector("#bookings").scrollIntoView({ behavior: "smooth", block: "nearest" });
});

renderServices();
renderBookings();
