<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#f7f8fc">
	<title>Campusly — Campus bookings, made easy</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<script src="script.js" defer></script>
</head>
<body>
	<div class="app-shell">
		<aside class="sidebar" aria-label="Main navigation">
			<a class="brand" href="#home" aria-label="Campusly home">
				<span class="brand-mark" aria-hidden="true">c</span>
				<span>campusly<span class="brand-dot">.</span></span>
			</a>

			<div class="campus-switcher">
				<span class="campus-icon" aria-hidden="true">✳</span>
				<span><small>YOUR CAMPUS</small><strong>Northwood College</strong></span>
				<span class="switch-chevron" aria-hidden="true">⌄</span>
			</div>

			<p class="nav-label">WORKSPACE</p>
			<nav class="main-nav">
				<a class="nav-link active" href="#home"><span class="nav-icon" aria-hidden="true">⌂</span>Discover</a>
				<a class="nav-link" href="#bookings"><span class="nav-icon calendar-nav-icon" aria-hidden="true">▦</span>My bookings<span class="nav-count" id="booking-count">0</span></a>
			</nav>

			<div class="sidebar-help">
				<div class="help-sparkle" aria-hidden="true">✦</div>
				<strong>Need a hand?</strong>
				<p>Our campus team is here to help you find your way.</p>
				<a href="mailto:campus-support@example.edu">Contact support <span aria-hidden="true">↗</span></a>
			</div>

			<div class="sidebar-profile">
				<div class="avatar avatar-small">JS</div>
				<span><strong>Jordan Smith</strong><small>Student account</small></span>
				<button class="profile-menu" aria-label="Profile options">···</button>
			</div>
		</aside>

		<main id="home" class="main-content">
			<header class="topbar">
				<div class="breadcrumb">Student portal <span>/</span> <strong>Discover</strong></div>
				<div class="topbar-actions">
					<span class="term-label"><span class="status-dot"></span> Fall semester 2026</span>
					<button class="notification-button" aria-label="Notifications"><span aria-hidden="true">♧</span><i></i></button>
					<div class="avatar avatar-top">JS</div>
				</div>
			</header>

			<section class="welcome-section">
				<div class="welcome-copy">
					<p class="eyebrow"><span class="wave">✳</span> YOUR CAMPUS, ON YOUR SCHEDULE</p>
					<h1>Make time for<br><span>what moves you.</span></h1>
					<p class="welcome-description">Book the spaces, support, and services that help you make the most of college life.</p>
					<a class="text-link" href="#services">Explore campus services <span aria-hidden="true">→</span></a>
				</div>
				<div class="hero-art" aria-label="Illustration of a student planning their campus day" role="img">
					<div class="hero-sun"></div>
					<div class="hero-blob"></div>
					<div class="hero-card card-note"><span class="note-icon">✦</span><span><b>One less thing</b><small>to figure out today</small></span></div>
					<div class="hero-card card-calendar"><span class="mini-calendar"><i>OCT</i><b>16</b></span><span><b>Good things</b><small>are on your calendar</small></span><span class="mini-check">✓</span></div>
					<div class="plant plant-one"><i></i><i></i><i></i><b></b></div>
					<div class="plant plant-two"><i></i><i></i><b></b></div>
					<div class="hero-person"><div class="person-hair"></div><div class="person-head"></div><div class="person-neck"></div><div class="person-body"></div><div class="person-arm"></div><div class="person-book">✦</div></div>
					<span class="hero-star star-one">✳</span><span class="hero-star star-two">✦</span>
				</div>
			</section>

			<section class="booking-panel" id="services">
				<div class="section-heading">
					<div><p class="eyebrow">A LITTLE SOMETHING FOR EVERY DAY</p><h2>Find your next campus moment</h2></div>
					<span class="availability-note"><span class="status-dot"></span> Live availability</span>
				</div>

				<div class="filter-row">
					<div class="date-picker" id="date-picker" aria-label="Choose a date"></div>
					<label class="search-box"><span aria-hidden="true">⌕</span><input id="service-search" type="search" placeholder="Search services" aria-label="Search services"><kbd>/</kbd></label>
				</div>

				<div class="category-row" role="group" aria-label="Filter by category">
					<button class="category-chip selected" data-category="All">All services <span id="all-service-count">05</span></button>
					<button class="category-chip" data-category="Study">Study spaces</button>
					<button class="category-chip" data-category="Academic">Academic support</button>
					<button class="category-chip" data-category="Campus life">Campus life</button>
				</div>

				<div class="service-grid" id="service-grid" aria-live="polite"></div>
				<div class="empty-state hidden" id="empty-state"><span>⌕</span><strong>No services found</strong><p>Try another search or choose a different category.</p></div>
			</section>

			<section class="upcoming-section" id="bookings">
				<div class="section-heading upcoming-heading">
					<div><p class="eyebrow">YOUR PLANS, ALL IN ONE PLACE</p><h2>Coming up</h2></div>
					<span class="booking-total" id="upcoming-total">0 bookings</span>
				</div>
				<div class="upcoming-list" id="upcoming-list"></div>
				<div class="upcoming-empty" id="upcoming-empty"><span class="empty-calendar" aria-hidden="true">▦</span><p>Your next campus moment starts here.</p><a href="#services">Find something to book <span aria-hidden="true">→</span></a></div>
			</section>

			<footer class="page-footer"><span>Made for your college days <span class="footer-heart">♥</span></span><span>Need help? <a href="mailto:campus-support@example.edu">Talk to campus support</a></span></footer>
		</main>
	</div>

	<div class="modal-backdrop hidden" id="booking-modal" role="presentation">
		<section class="booking-modal" role="dialog" aria-modal="true" aria-labelledby="modal-title">
			<button class="modal-close" id="modal-close" aria-label="Close booking form">×</button>
			<div class="modal-icon" id="modal-icon">✦</div>
			<p class="eyebrow">MAKE IT YOURS</p>
			<h2 id="modal-title">Book a campus moment</h2>
			<p class="modal-service" id="modal-service"></p>
			<form id="booking-form">
				<input type="hidden" id="booking-service-id">
				<input type="hidden" id="booking-date">
				<input type="hidden" id="booking-time">
				<label class="field-label" for="student-name">Your name</label>
				<input class="form-input" id="student-name" name="name" autocomplete="name" placeholder="e.g. Jordan Smith" required>
				<label class="field-label" for="student-email">College email</label>
				<input class="form-input" id="student-email" name="email" type="email" autocomplete="email" placeholder="you@college.edu" required>
				<div class="booking-summary" id="booking-summary"></div>
				<button class="primary-button submit-booking" type="submit">Confirm booking <span aria-hidden="true">→</span></button>
				<p class="privacy-note">Your details are only used to manage this booking.</p>
			</form>
		</section>
	</div>
	<div class="toast" id="toast" role="status" aria-live="polite"></div>
</body>
</html>


 :root {
	--ink: #20233a;
	--muted: #898b9d;
	--purple: #6d5ce8;
	--purple-dark: #5544d2;
	--line: #eeedf4;
	--surface: #ffffff;
	--canvas: #f7f8fc;
	--mint: #dff3ea;
	--font-body: "DM Sans", sans-serif;
	--font-heading: "Manrope", sans-serif;
}

* { box-sizing: border-box; }
html { scroll-behavior: smooth; }
body { margin: 0; background: var(--canvas); color: var(--ink); font-family: var(--font-body); font-size: 14px; -webkit-font-smoothing: antialiased; }
button, input { font: inherit; }
button, a { -webkit-tap-highlight-color: transparent; }
a { color: inherit; text-decoration: none; }
.hidden { display: none !important; }
.app-shell { min-height: 100vh; }

.sidebar { width: 248px; position: fixed; inset: 0 auto 0 0; z-index: 4; display: flex; flex-direction: column; padding: 29px 19px 17px; background: #fff; border-right: 1px solid #eeedf3; }
.brand { display: flex; align-items: center; gap: 10px; padding: 0 8px; font: 800 21px var(--font-heading); letter-spacing: -1.2px; }
.brand-mark { width: 29px; height: 29px; display: grid; place-items: center; border-radius: 10px; background: var(--purple); color: #fff; font: 800 23px var(--font-heading); letter-spacing: -2px; transform: rotate(-5deg); }
.brand-dot { color: var(--purple); }
.campus-switcher { display: flex; align-items: center; gap: 11px; margin: 40px 0 35px; padding: 12px 10px; border: 1px solid var(--line); border-radius: 11px; }
.campus-icon { display: grid; place-items: center; width: 34px; height: 34px; border-radius: 9px; background: #f0edff; color: var(--purple); font-size: 20px; }
.campus-switcher span:nth-child(2) { min-width: 0; flex: 1; }
.campus-switcher small, .sidebar-profile small { display: block; color: #a0a1ae; font-size: 9px; font-weight: 700; letter-spacing: .7px; }
.campus-switcher strong { display: block; margin-top: 4px; font-size: 11px; white-space: nowrap; }
.switch-chevron { color: #a6a6b1; font-size: 18px; }
.nav-label, .eyebrow { color: #9c9eac; font-size: 9px; font-weight: 700; letter-spacing: 1.15px; }
.nav-label { margin: 0 10px 12px; }
.main-nav { display: grid; gap: 5px; }
.nav-link { height: 42px; display: flex; align-items: center; gap: 12px; padding: 0 12px; border-radius: 8px; color: #77798b; font-size: 12px; font-weight: 600; }
.nav-link:hover, .nav-link.active { background: #f1efff; color: var(--purple); }
.nav-icon { width: 18px; font-size: 20px; line-height: 1; text-align: center; }
.calendar-nav-icon { font-size: 17px; }
.nav-count { margin-left: auto; padding: 3px 7px; border-radius: 10px; background: #f0eff5; color: #858697; font-size: 10px; }
.sidebar-help { margin-top: auto; padding: 15px 14px; border-radius: 11px; background: #f8f6ff; }
.help-sparkle { display: grid; place-items: center; width: 27px; height: 27px; margin-bottom: 12px; border-radius: 8px; background: #ebe7ff; color: var(--purple); }
.sidebar-help strong { font: 700 12px var(--font-heading); }
.sidebar-help p { margin: 7px 0 12px; color: #858698; font-size: 10px; line-height: 1.55; }
.sidebar-help a { color: var(--purple); font-size: 10px; font-weight: 700; }
.sidebar-profile { display: flex; align-items: center; gap: 10px; margin-top: 17px; padding: 13px 3px 0; border-top: 1px solid var(--line); }
.avatar { display: grid; place-items: center; flex: none; border-radius: 50%; background: #f7d9c8; color: #875544; font-weight: 700; }
.avatar-small { width: 32px; height: 32px; font-size: 10px; }
.sidebar-profile span { flex: 1; }
.sidebar-profile strong { display: block; margin-bottom: 4px; font-size: 11px; }
.sidebar-profile small { font-size: 9px; letter-spacing: 0; }
.profile-menu { border: 0; background: none; color: #8e90a0; font-size: 22px; cursor: pointer; }

.main-content { max-width: 1600px; margin-left: 248px; padding: 0 5.2%; }
.topbar { height: 74px; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #eaeaf0; }
.breadcrumb { color: #9799a8; font-size: 11px; }
.breadcrumb span { padding: 0 8px; color: #c5c6ce; }
.breadcrumb strong { color: #45475b; font-weight: 600; }
.topbar-actions { display: flex; align-items: center; gap: 20px; }
.term-label { display: flex; align-items: center; gap: 7px; color: #6e7082; font-size: 10px; }
.status-dot { display: inline-block; width: 6px; height: 6px; border-radius: 50%; background: #6bc59c; box-shadow: 0 0 0 3px #e6f5ee; }
.notification-button { position: relative; border: 0; background: none; color: #77798b; font-size: 20px; cursor: pointer; }
.notification-button i { position: absolute; top: 3px; right: 3px; width: 5px; height: 5px; border: 1px solid #fff; border-radius: 50%; background: #ff887f; }
.avatar-top { width: 31px; height: 31px; font-size: 10px; }

.welcome-section { min-height: 300px; display: flex; align-items: center; position: relative; overflow: hidden; margin: 24px 0 34px; padding: 31px 44px; border-radius: 16px; background: #f0edff; }
.welcome-copy { position: relative; z-index: 1; max-width: 55%; }
.welcome-copy .eyebrow { color: #7e72cb; margin: 0 0 13px; }
.wave { margin-right: 6px; font-size: 12px; }
h1, h2, p { margin-top: 0; }
h1 { margin-bottom: 12px; font: 800 clamp(30px, 3.1vw, 41px)/1.14 var(--font-heading); letter-spacing: -2px; }
h1 span { color: var(--purple); }
.welcome-description { max-width: 340px; margin-bottom: 19px; color: #77788c; font-size: 12px; line-height: 1.65; }
.text-link { color: #6051d9; font-size: 11px; font-weight: 700; }
.text-link span { padding-left: 5px; font-size: 15px; vertical-align: -1px; }
.hero-art { position: absolute; width: 43%; height: 100%; right: 0; top: 0; overflow: hidden; }
.hero-blob { position: absolute; width: 245px; height: 245px; bottom: -84px; right: 91px; border-radius: 50% 50% 0 0; background: #d4ccff; }
.hero-sun { position: absolute; width: 122px; height: 122px; top: 33px; right: 121px; border-radius: 50%; background: #e4dfff; }
.hero-card { position: absolute; z-index: 2; display: flex; align-items: center; gap: 9px; padding: 10px 12px; border-radius: 9px; background: #fff; box-shadow: 0 9px 24px #4335961a; }
.hero-card b, .hero-card small { display: block; white-space: nowrap; }
.hero-card b { margin-bottom: 4px; font-size: 9px; }
.hero-card small { color: #9899a8; font-size: 8px; }
.card-note { top: 42px; left: 2%; transform: rotate(-4deg); }
.note-icon { display: grid; place-items: center; width: 24px; height: 24px; border-radius: 7px; background: #e7f6ed; color: #61b38a; font-size: 13px; }
.card-calendar { bottom: 39px; right: 4%; transform: rotate(3deg); }
.mini-calendar { width: 28px; height: 31px; display: grid; place-items: center; border: 1px solid #f0edf5; border-radius: 5px; }
.mini-calendar i { align-self: end; color: #ff8e83; font-size: 6px; font-style: normal; font-weight: 700; }
.mini-calendar b { margin: 0; align-self: start; font-size: 12px; }
.mini-check { display: grid; place-items: center; width: 17px; height: 17px; margin-left: 4px; border-radius: 50%; background: #e7f6ed; color: #54a97b; font-size: 10px; }
.hero-person { position: absolute; z-index: 1; width: 85px; height: 175px; right: 39%; bottom: -17px; }
.person-head { position: absolute; z-index: 2; top: 19px; left: 29px; width: 36px; height: 44px; border-radius: 47% 47% 42% 45%; background: #a96448; transform: rotate(-6deg); }
.person-hair { position: absolute; z-index: 3; top: 14px; left: 25px; width: 43px; height: 24px; border-radius: 70% 50% 20% 5%; background: #30243f; transform: rotate(-8deg); }
.person-neck { position: absolute; z-index: 1; top: 53px; left: 39px; width: 18px; height: 18px; background: #a96448; }
.person-body { position: absolute; top: 65px; left: 13px; width: 70px; height: 120px; border-radius: 31px 31px 0 0; background: #e39b6a; transform: rotate(4deg); }
.person-arm { position: absolute; z-index: 2; top: 80px; left: 0; width: 43px; height: 15px; border-radius: 9px; background: #a96448; transform: rotate(-38deg); }
.person-book { position: absolute; z-index: 4; top: 56px; left: -13px; display: grid; place-items: center; width: 31px; height: 39px; border-radius: 3px; background: #fff2aa; color: #d2a931; font-size: 10px; transform: rotate(-12deg); }
.plant { position: absolute; bottom: 0; width: 38px; height: 60px; }
.plant b { position: absolute; bottom: 0; left: 10px; width: 22px; height: 23px; border-radius: 3px 3px 10px 10px; background: #c47c67; }
.plant i { position: absolute; z-index: 1; bottom: 21px; left: 16px; width: 13px; height: 28px; border-radius: 100% 0 100% 0; background: #67a98d; transform: rotate(-25deg); }
.plant i:nth-child(2) { left: 5px; bottom: 27px; transform: rotate(-55deg) scale(.8); }
.plant i:nth-child(3) { left: 25px; bottom: 34px; transform: rotate(10deg) scale(.75); }
.plant-one { right: 16px; }
.plant-two { left: 16%; transform: scale(.75); }
.hero-star { position: absolute; color: #ffb677; }
.star-one { top: 58px; right: 17%; font-size: 18px; }
.star-two { top: 136px; left: 30%; color: #fff; font-size: 13px; }

.booking-panel, .upcoming-section { padding: 0 1px; }
.section-heading { display: flex; align-items: flex-end; justify-content: space-between; gap: 16px; }
.section-heading .eyebrow { margin-bottom: 7px; }
h2 { margin-bottom: 0; font: 750 20px var(--font-heading); letter-spacing: -.7px; }
.availability-note { display: flex; align-items: center; gap: 8px; padding-bottom: 3px; color: #858797; font-size: 10px; }
.filter-row { display: flex; align-items: center; justify-content: space-between; gap: 16px; margin-top: 20px; }
.date-picker { display: flex; align-items: center; gap: 6px; }
.date-option { width: 50px; height: 56px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 5px; border: 1px solid transparent; border-radius: 9px; background: transparent; color: #9698a7; cursor: pointer; }
.date-option span { font-size: 9px; }
.date-option strong { color: #424458; font-size: 13px; }
.date-option.selected { border-color: #e4e0ff; background: #fff; box-shadow: 0 3px 10px #382e7510; }
.date-option.selected span, .date-option.selected strong { color: var(--purple); }
.date-option:hover { background: #fff; }
.search-box { width: 218px; height: 38px; display: flex; align-items: center; gap: 8px; padding: 0 10px; border: 1px solid #e9e9ef; border-radius: 8px; background: #fff; color: #9698a7; }
.search-box > span { font-size: 20px; transform: rotate(-20deg); }
.search-box input { width: 100%; min-width: 0; border: 0; outline: 0; color: var(--ink); font-size: 10px; }
.search-box input::placeholder { color: #a4a5b0; }
.search-box kbd { padding: 2px 5px; border: 1px solid #ececf1; border-radius: 4px; color: #a7a8b2; font-size: 9px; }
.category-row { display: flex; flex-wrap: wrap; gap: 8px; margin: 13px 0 16px; }
.category-chip { min-height: 28px; padding: 0 11px; border: 1px solid #e9e9f0; border-radius: 6px; background: transparent; color: #77798b; font-size: 9px; cursor: pointer; }
.category-chip.selected { border-color: var(--ink); background: var(--ink); color: #fff; }
.category-chip span { margin-left: 5px; color: #b8b8c2; }
.category-chip.selected span { color: #c5c0fa; }
.service-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 13px; }
.service-card { min-width: 0; padding: 15px 15px 13px; border: 1px solid #eeedf3; border-radius: 11px; background: #fff; transition: transform .18s ease, box-shadow .18s ease; }
.service-card:hover { transform: translateY(-2px); box-shadow: 0 9px 22px #29214b0c; }
.service-card-top { display: flex; align-items: flex-start; justify-content: space-between; }
.service-icon { display: grid; place-items: center; width: 36px; height: 36px; border-radius: 10px; font-size: 17px; }
.icon-lilac { background: #efedff; color: #7667e7; }
.icon-peach { background: #fff0e8; color: #d78961; }
.icon-mint { background: #e7f6ef; color: #5da783; }
.icon-blue { background: #eaf3ff; color: #568dc1; }
.icon-yellow { background: #fff6db; color: #c59a36; }
.service-category { padding: 5px 7px; border-radius: 5px; background: #f7f6fa; color: #9697a4; font-size: 8px; }
.service-card h3 { margin: 12px 0 5px; font: 700 12px var(--font-heading); }
.service-card p { min-height: 30px; margin-bottom: 13px; color: #8c8e9d; font-size: 9px; line-height: 1.55; }
.service-meta { display: flex; align-items: center; justify-content: space-between; padding-top: 10px; border-top: 1px solid #f0eff4; }
.slots-label { color: #8b8d9c; font-size: 9px; }
.slots-label strong { color: #525467; font-weight: 700; }
.reserve-button { border: 0; background: transparent; color: var(--purple); font-size: 9px; font-weight: 700; cursor: pointer; }
.reserve-button span { padding-left: 3px; font-size: 13px; }
.empty-state { padding: 36px 0; text-align: center; color: #868897; }
.empty-state > span { font-size: 24px; }
.empty-state strong { display: block; margin-top: 8px; color: var(--ink); }
.empty-state p { margin: 5px 0 0; font-size: 11px; }

.upcoming-section { margin-top: 39px; padding-top: 23px; border-top: 1px solid #eaeaf0; }
.upcoming-heading { align-items: center; }
.upcoming-heading .eyebrow { margin-bottom: 6px; }
.booking-total { color: #9092a0; font-size: 10px; }
.upcoming-list { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 11px; margin-top: 17px; }
.upcoming-card { display: flex; align-items: center; gap: 12px; padding: 12px; border: 1px solid #eeedf3; border-radius: 10px; background: #fff; }
.upcoming-date { width: 42px; height: 46px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 2px; border-radius: 8px; background: #f1efff; color: var(--purple); }
.upcoming-date span { font-size: 8px; font-weight: 700; text-transform: uppercase; }
.upcoming-date strong { font: 700 17px var(--font-heading); }
.upcoming-detail { min-width: 0; flex: 1; }
.upcoming-detail strong { display: block; overflow: hidden; font-size: 10px; text-overflow: ellipsis; white-space: nowrap; }
.upcoming-detail span { display: block; margin-top: 5px; color: #8c8e9d; font-size: 9px; }
.cancel-button { padding: 6px 8px; border: 1px solid #eeeef2; border-radius: 5px; background: #fff; color: #9596a3; font-size: 9px; cursor: pointer; }
.cancel-button:hover { border-color: #f2caca; color: #cb6969; }
.upcoming-empty { display: flex; align-items: center; gap: 12px; margin-top: 15px; padding: 15px; border: 1px dashed #dedde7; border-radius: 9px; color: #9092a0; }
.empty-calendar { display: grid; place-items: center; width: 33px; height: 33px; border-radius: 8px; background: #efedff; color: var(--purple); font-size: 17px; }
.upcoming-empty p { flex: 1; margin: 0; font-size: 10px; }
.upcoming-empty a { color: var(--purple); font-size: 10px; font-weight: 700; }
.page-footer { display: flex; justify-content: space-between; margin: 39px 0 21px; padding-top: 14px; border-top: 1px solid #eaeaf0; color: #a1a2ae; font-size: 9px; }
.page-footer a { color: #737587; }
.footer-heart { color: #ec8a8b; }

.modal-backdrop { position: fixed; z-index: 10; inset: 0; display: grid; place-items: center; overflow-y: auto; padding: 20px; background: #17172a80; backdrop-filter: blur(4px); }
.booking-modal { position: relative; width: min(100%, 410px); padding: 30px; border-radius: 16px; background: #fff; box-shadow: 0 22px 80px #11112a30; animation: modal-in .2s ease-out; }
@keyframes modal-in { from { opacity: 0; transform: translateY(9px) scale(.98); } to { opacity: 1; transform: translateY(0) scale(1); } }
.modal-close { position: absolute; top: 15px; right: 16px; width: 30px; height: 30px; border: 0; border-radius: 50%; background: #f5f4f8; color: #818392; font-size: 20px; cursor: pointer; }
.modal-icon { display: grid; place-items: center; width: 42px; height: 42px; margin-bottom: 17px; border-radius: 12px; background: #efedff; color: var(--purple); font-size: 19px; }
.booking-modal .eyebrow { margin-bottom: 7px; color: #8e82dc; }
.booking-modal h2 { font-size: 21px; }
.modal-service { margin: 7px 0 20px; color: #858797; font-size: 11px; }
.field-label { display: block; margin: 14px 0 6px; color: #535568; font-size: 10px; font-weight: 700; }
.form-input { width: 100%; height: 40px; padding: 0 11px; border: 1px solid #e6e5ec; border-radius: 7px; outline: none; font-size: 11px; }
.form-input:focus { border-color: #9a8ff2; box-shadow: 0 0 0 3px #efedff; }
.form-input::placeholder { color: #b1b2bd; }
.booking-summary { display: flex; justify-content: space-between; gap: 12px; margin-top: 16px; padding: 12px; border-radius: 8px; background: #f7f6ff; color: #66677a; font-size: 10px; }
.booking-summary strong { color: #38394d; text-align: right; }
.primary-button { width: 100%; height: 43px; border: 0; border-radius: 7px; background: var(--purple); color: #fff; font-size: 11px; font-weight: 700; cursor: pointer; transition: background .15s ease; }
.primary-button:hover { background: var(--purple-dark); }
.submit-booking { margin-top: 16px; }
.submit-booking span { padding-left: 5px; font-size: 15px; vertical-align: -1px; }
.privacy-note { margin: 11px 0 0; color: #a0a1ad; font-size: 9px; text-align: center; }
.toast { position: fixed; z-index: 20; right: 24px; bottom: 24px; max-width: calc(100vw - 32px); padding: 13px 17px; border-radius: 9px; background: #25243b; color: #fff; box-shadow: 0 7px 25px #20203a35; font-size: 11px; opacity: 0; pointer-events: none; transform: translateY(8px); transition: opacity .2s ease, transform .2s ease; }
.toast.visible { opacity: 1; transform: translateY(0); }

@media (min-width: 1500px) { .main-content { padding-right: 6%; padding-left: 6%; } .service-card { padding: 18px; } }
@media (max-width: 1100px) { .sidebar { width: 220px; } .main-content { margin-left: 220px; padding-right: 3.5%; padding-left: 3.5%; } .welcome-section { padding-left: 31px; } .service-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } .hero-art { width: 45%; } }
@media (max-width: 760px) { .sidebar { width: 66px; padding: 20px 10px 12px; align-items: center; } .brand { padding: 0; } .brand > span:not(.brand-mark), .campus-switcher, .nav-label, .nav-link:not(.active), .nav-link.active { font-size: 0; } .brand-mark { width: 34px; height: 34px; } .sidebar .main-nav { width: 100%; margin-top: 38px; } .nav-link { justify-content: center; width: 44px; padding: 0; font-size: 0 !important; } .nav-icon { font-size: 20px; } .nav-count, .sidebar-help, .sidebar-profile span, .profile-menu { display: none; } .sidebar-profile { justify-content: center; width: 100%; } .main-content { margin-left: 66px; padding-right: 22px; padding-left: 22px; } .topbar { height: 63px; } .term-label { display: none; } .welcome-section { min-height: 285px; margin-top: 18px; padding: 29px 25px; } .welcome-copy { max-width: 67%; } h1 { font-size: clamp(29px, 5vw, 37px); } .hero-art { width: 48%; opacity: .8; } .card-note { left: auto; right: 1%; transform: scale(.8) rotate(-4deg); transform-origin: top right; } .card-calendar { right: -2%; transform: scale(.8) rotate(3deg); transform-origin: bottom right; } .hero-person { right: 29%; transform: scale(.86); transform-origin: bottom center; } .filter-row { align-items: flex-start; flex-direction: column; } .date-picker { width: 100%; justify-content: space-between; } .date-option { width: 12%; } .search-box { width: 100%; } .upcoming-list { grid-template-columns: 1fr; } }
@media (max-width: 520px) { .main-content { padding-right: 15px; padding-left: 15px; } .breadcrumb { font-size: 10px; } .topbar-actions { gap: 13px; } .welcome-section { min-height: 280px; padding: 25px 20px; } .welcome-copy { max-width: 100%; align-self: flex-start; } .welcome-description { max-width: 235px; font-size: 11px; } .welcome-copy .eyebrow { max-width: 210px; font-size: 8px; } .hero-art { width: 100%; opacity: .42; } .hero-sun { right: 40px; } .hero-blob { right: 0; } .hero-person { right: 20%; } .card-note { top: auto; bottom: 40px; left: 2%; right: auto; transform: scale(.76) rotate(-4deg); transform-origin: bottom left; } .card-calendar { right: 0; bottom: 11px; transform: scale(.72) rotate(3deg); } .section-heading { align-items: flex-start; } .section-heading h2 { font-size: 18px; } .availability-note { padding-top: 6px; font-size: 9px; white-space: nowrap; } .category-row { gap: 6px; } .category-chip { padding: 0 8px; font-size: 8px; } .service-grid { grid-template-columns: 1fr; } .service-card { padding: 14px; } .service-card p { min-height: auto; } .upcoming-empty { align-items: flex-start; flex-wrap: wrap; } .upcoming-empty p { padding-top: 9px; } .upcoming-empty a { width: 100%; margin-left: 45px; } .page-footer { gap: 10px; flex-direction: column; } .booking-modal { padding: 25px 21px; } }

@media (prefers-reduced-motion: reduce) { *, *::before, *::after { scroll-behavior: auto !important; animation-duration: .01ms !important; animation-iteration-count: 1 !important; transition-duration: .01ms !important; } }


const services = [
	{ id: "study-room", title: "Library study room", category: "Study", categoryLabel: "Study spaces", description: "A quiet corner for focused work or a group study session.", icon: "▤", iconClass: "icon-lilac", location: "Morrow Library · 2nd floor", duration: "30–120 min", slots: ["9:00 AM", "10:30 AM", "12:00 PM", "2:00 PM", "3:30 PM"] },
	{ id: "peer-tutoring", title: "Peer tutoring", category: "Academic", categoryLabel: "Academic support", description: "Get unstuck with a student tutor who knows the course.", icon: "✎", iconClass: "icon-peach", location: "Learning Commons · Online", duration: "45 min", slots: ["9:30 AM", "11:00 AM", "1:00 PM", "2:30 PM"] },
	{ id: "advising", title: "Academic advising", category: "Academic", categoryLabel: "Academic support", description: "Talk through your classes, goals, and next steps.", icon: "✧", iconClass: "icon-mint", location: "Student Center · Suite 210", duration: "30 min", slots: ["10:00 AM", "11:30 AM", "1:30 PM", "3:00 PM"] },
	{ id: "maker-space", title: "Maker space", category: "Study", categoryLabel: "Study spaces", description: "Reserve tools and space to bring your next idea to life.", icon: "⚙", iconClass: "icon-blue", location: "Innovation Hall · Lab 104", duration: "60 min", slots: ["9:00 AM", "11:00 AM", "1:00 PM", "3:00 PM"] },
	{ id: "career-coaching", title: "Career coaching", category: "Campus life", categoryLabel: "Campus life", description: "Get a fresh perspective on resumes, interviews, and more.", icon: "↗", iconClass: "icon-yellow", location: "Career Hub · Online", duration: "30 min", slots: ["10:30 AM", "12:00 PM", "2:00 PM", "4:00 PM"] }
];

const STORAGE_KEY = "campusly-bookings-v1";
const datePicker = document.querySelector("#date-picker");
const serviceGrid = document.querySelector("#service-grid");
const emptyState = document.querySelector("#empty-state");
const searchInput = document.querySelector("#service-search");
const categoryButtons = [...document.querySelectorAll(".category-chip")];
const modal = document.querySelector("#booking-modal");
const bookingForm = document.querySelector("#booking-form");
const toast = document.querySelector("#toast");

let selectedDate = new Date();
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

function renderDates() {
	datePicker.replaceChildren();
	const today = new Date();
	today.setHours(0, 0, 0, 0);

	for (let offset = 0; offset < 7; offset += 1) {
		const date = new Date(today);
		date.setDate(today.getDate() + offset);
		const button = document.createElement("button");
		button.type = "button";
		button.className = `date-option${localDateKey(date) === localDateKey(selectedDate) ? " selected" : ""}`;
		button.setAttribute("aria-pressed", String(localDateKey(date) === localDateKey(selectedDate)));
		button.innerHTML = `<span>${offset === 0 ? "Today" : new Intl.DateTimeFormat("en-US", { weekday: "short" }).format(date)}</span><strong>${date.getDate()}</strong>`;
		button.addEventListener("click", () => {
			selectedDate = date;
			renderDates();
			renderServices();
		});
		datePicker.append(button);
	}
}

function reservedSlots(serviceId, date) {
	return getBookings().filter((booking) => booking.serviceId === serviceId && booking.date === date).map((booking) => booking.time);
}

function renderServices() {
	const query = searchInput.value.trim().toLowerCase();
	const dateKey = localDateKey(selectedDate);
	const filtered = services.filter((service) => {
		const matchesCategory = selectedCategory === "All" || service.category === selectedCategory;
		const matchesSearch = `${service.title} ${service.description} ${service.categoryLabel} ${service.location}`.toLowerCase().includes(query);
		return matchesCategory && matchesSearch;
	});

	serviceGrid.replaceChildren();
	emptyState.classList.toggle("hidden", filtered.length > 0);
	document.querySelector("#all-service-count").textContent = String(services.length).padStart(2, "0");

	filtered.forEach((service) => {
		const reserved = reservedSlots(service.id, dateKey);
		const availableCount = service.slots.filter((slot) => !reserved.includes(slot)).length;
		const card = document.createElement("article");
		card.className = "service-card";
		card.innerHTML = `
			<div class="service-card-top"><span class="service-icon ${service.iconClass}" aria-hidden="true">${service.icon}</span><span class="service-category">${service.categoryLabel}</span></div>
			<h3>${service.title}</h3>
			<p>${service.description}</p>
			<div class="service-meta"><span class="slots-label"><strong>${availableCount}</strong> times · ${service.duration}</span><button class="reserve-button" type="button" ${availableCount === 0 ? "disabled" : ""}>${availableCount === 0 ? "Fully booked" : "See times"} <span aria-hidden="true">→</span></button></div>`;
		card.querySelector(".reserve-button").addEventListener("click", () => openBooking(service, dateKey));
		serviceGrid.append(card);
	});
}

function openBooking(service, dateKey) {
	const taken = reservedSlots(service.id, dateKey);
	const availableSlots = service.slots.filter((slot) => !taken.includes(slot));
	if (!availableSlots.length) {
		showToast("This service is fully booked on that date.");
		return;
	}

	const date = new Date(`${dateKey}T12:00:00`);
	document.querySelector("#booking-service-id").value = service.id;
	document.querySelector("#booking-date").value = dateKey;
	document.querySelector("#modal-icon").textContent = service.icon;
	document.querySelector("#modal-service").textContent = `${service.title} · ${service.location}`;
	document.querySelector("#booking-summary").innerHTML = `<span>${formatLongDate(date)}</span><strong>${availableSlots.length} times available</strong>`;
	document.querySelector("#booking-time").value = availableSlots[0];

	const timeControl = document.createElement("div");
	timeControl.className = "time-slots";
	timeControl.setAttribute("role", "group");
	timeControl.setAttribute("aria-label", "Choose a time");
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
	const existing = bookingForm.querySelector(".time-slots");
	if (existing) existing.remove();
	document.querySelector("#booking-summary").before(timeControl);
	modal.classList.remove("hidden");
	document.body.classList.add("modal-open");
	document.querySelector("#student-name").focus();
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
	const bookings = getBookings();
	if (bookings.some((booking) => booking.serviceId === serviceId && booking.date === date && booking.time === time)) {
		closeModal();
		renderServices();
		showToast("That time was just booked. Please choose another.");
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
	showToast(`You're booked for ${service.title}!`);
	document.querySelector("#bookings").scrollIntoView({ behavior: "smooth", block: "nearest" });
});

renderDates();
renderServices();
renderBookings();
