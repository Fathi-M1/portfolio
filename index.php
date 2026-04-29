<?php
// Include resume data
require_once('data.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?php echo htmlspecialchars($resume['personal']['name']); ?> — Resume</title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --teal: #1abc9c;
      --teal-dark: #159f84;
      --teal-bg: #e8faf5;
      --dark: #1a2332;
      --dark-sec: #2e3d50;
      --muted: #7f8c9a;
      --light: #f5f7fa;
      --white: #ffffff;
      --border: #e4eaf0;
      --serif: 'Playfair Display', lato;
      --sans: 'Nunito', sans-serif;
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body { font-family: var(--sans); background: var(--white); color: var(--dark); overflow-x: hidden; }

    /* NAV */
    nav {
      position: fixed; top: 0; left: 0; right: 0; z-index: 100;
      background: rgba(255,255,255,0.96);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--border);
      padding: 0 60px;
      height: 64px;
      display: flex; align-items: center; justify-content: space-between;
    }
    .nav-logo { font-family: var(--serif); font-size: 1.3rem; font-weight: 700; color: var(--dark); text-decoration: none; }
    .nav-logo span { color: var(--teal); }
    .nav-links { display: flex; gap: 32px; list-style: none; }
    .nav-links a {
      text-decoration: none; font-size: 0.82rem; font-weight: 600;
      color: var(--muted); letter-spacing: 0.05em; text-transform: uppercase;
      transition: color 0.2s; position: relative;
    }
    .nav-links a::after {
      content: ''; position: absolute; bottom: -4px; left: 0; right: 0;
      height: 2px; background: var(--teal);
      transform: scaleX(0); transform-origin: left; transition: transform 0.25s;
    }
    .nav-links a:hover, .nav-links a.active { color: var(--teal); }
    .nav-links a:hover::after, .nav-links a.active::after { transform: scaleX(1); }
    .nav-socials { display: flex; gap: 10px; }
    .nav-socials a {
      width: 32px; height: 32px; border-radius: 50%; background: var(--teal);
      display: flex; align-items: center; justify-content: center;
      transition: transform 0.2s, background 0.2s; text-decoration: none;
    }
    .nav-socials a:hover { transform: translateY(-2px); background: var(--teal-dark); }
    .nav-socials svg { width: 13px; height: 13px; fill: white; }

    /* HERO */
    #home {
      min-height: 100vh; padding-top: 64px;
      display: grid; grid-template-columns: 1fr 1fr;
      align-items: center; position: relative; overflow: hidden;
    }
    .hero-bg-circle {
      position: absolute; width: 520px; height: 520px; border-radius: 50%;
      background: var(--teal-bg); top: 50%; right: -60px;
      transform: translateY(-50%); z-index: 0;
    }
    .hero-text {
      padding: 80px 60px 100px 80px; position: relative; z-index: 1;
      animation: fadeLeft 0.9s ease both;
    }
    @keyframes fadeLeft { from { opacity:0; transform:translateX(-30px); } to { opacity:1; transform:translateX(0); } }
    .hero-greeting { font-size: 0.78rem; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: var(--teal); margin-bottom: 14px; }
    .hero-text h1 { font-family: var(--serif); font-size: 3.4rem; line-height: 1.12; font-weight: 900; margin-bottom: 20px; }
    .hero-text h1 span { color: var(--teal); }
    .hero-text p { color: var(--muted); font-size: 0.93rem; line-height: 1.8; max-width: 440px; margin-bottom: 32px; }
    .hero-btns { display: flex; gap: 14px; flex-wrap: wrap; }
    .btn-teal {
      padding: 12px 30px; background: var(--teal); color: white;
      border: none; border-radius: 30px; font-family: var(--sans); font-size: 0.82rem;
      font-weight: 600; cursor: pointer; text-decoration: none; display: inline-block;
      letter-spacing: 0.05em; transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
    }
    .btn-teal:hover { background: var(--teal-dark); transform: translateY(-2px); box-shadow: 0 8px 20px rgba(26,188,156,0.3); }
    .btn-outline {
      padding: 12px 30px; background: transparent; color: var(--teal);
      border: 2px solid var(--teal); border-radius: 30px; font-family: var(--sans);
      font-size: 0.82rem; font-weight: 600; cursor: pointer; text-decoration: none;
      display: inline-block; letter-spacing: 0.05em; transition: background 0.2s, transform 0.2s;
    }
    .btn-outline:hover { background: var(--teal-bg); transform: translateY(-2px); }
    .hero-image {
      position: relative; z-index: 1;
      display: flex; justify-content: center; align-items: flex-end;
      padding-top: 64px; animation: fadeRight 0.9s ease both;
    }
    @keyframes fadeRight { from { opacity:0; transform:translateX(30px); } to { opacity:1; transform:translateX(0); } }
    .hero-image img {
      width: 400px; max-width: 100%; object-fit: cover;
      filter: drop-shadow(0 20px 40px rgba(26,188,156,0.18));
    }
    .hero-stats {
      position: absolute; bottom: 40px; left: 80px;
      display: flex; gap: 40px; z-index: 2;
    }
    .h-stat .num { font-family: var(--serif); font-size: 2rem; font-weight: 900; color: var(--teal); line-height: 1; }
    .h-stat .lbl { font-size: 0.72rem; color: var(--muted); margin-top: 4px; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase; }

    /* SECTIONS */
    .section { padding: 90px 80px; }
    .section-light { background: var(--light); }
    .section-white { background: var(--white); }
    .section-dark { background: var(--dark); color: white; }
    .sec-label { font-size: 0.72rem; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: var(--teal); margin-bottom: 10px; }
    .sec-title { font-family: var(--serif); font-size: 2.2rem; font-weight: 900; margin-bottom: 16px; }
    .sec-title span { color: var(--teal); }
    .sec-desc { color: var(--muted); font-size: 0.9rem; line-height: 1.8; max-width: 580px; margin-bottom: 40px; }
    .section-dark .sec-title { color: white; }
    .section-dark .sec-desc { color: rgba(255,255,255,0.5); }

    /* ABOUT */
    .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
    .about-images { position: relative; height: 380px; }
    .about-img-main {
      width: 260px; height: 310px; object-fit: cover; object-position: top;
      border-radius: 16px; position: absolute; top: 0; left: 0;
      box-shadow: 0 16px 40px rgba(0,0,0,0.1);
    }
    .about-img-secondary {
      width: 180px; height: 200px; object-fit: cover; object-position: top;
      border-radius: 16px; position: absolute; bottom: 0; right: 20px;
      box-shadow: 0 16px 40px rgba(0,0,0,0.12); border: 5px solid white;
    }
    .about-accent {
      position: absolute; top: 60px; right: 10px;
      width: 80px; height: 80px; border-radius: 50%;
      background: var(--teal); opacity: 0.12;
    }
    .about-detail { display: flex; gap: 32px; margin: 24px 0; flex-wrap: wrap; }
    .about-detail-item .label { font-size: 0.7rem; font-weight: 700; color: var(--muted); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 3px; }
    .about-detail-item .value { font-weight: 600; color: var(--dark); font-size: 0.88rem; }

    /* SKILLS */
    .skills-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
    .skill-card {
      background: var(--light); border-radius: 14px; padding: 22px 26px;
      border: 1px solid var(--border); transition: transform 0.2s, box-shadow 0.2s;
    }
    .skill-card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(0,0,0,0.07); }
    .sk-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
    .sk-name { font-weight: 600; font-size: 0.88rem; }
    .sk-pct { font-size: 0.78rem; font-weight: 700; color: var(--teal); }
    .sk-bar { height: 5px; background: var(--border); border-radius: 99px; overflow: hidden; }
    .sk-fill { height: 100%; background: linear-gradient(90deg, var(--teal), #7ee8d4); border-radius: 99px; transform-origin: left; animation: barGrow 1.4s cubic-bezier(.22,1,.36,1) both; }
    @keyframes barGrow { from { transform: scaleX(0); } to { transform: scaleX(1); } }

    /* EXPERIENCE */
    .exp-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 22px; }
    .exp-card {
      background: var(--white); border-radius: 14px; padding: 28px;
      border: 1px solid var(--border);
      transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
      position: relative; overflow: hidden;
    }
    .exp-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0;
      height: 3px; background: linear-gradient(90deg, var(--teal), #7ee8d4);
    }
    .exp-card:hover { transform: translateY(-4px); box-shadow: 0 16px 36px rgba(0,0,0,0.07); border-color: rgba(26,188,156,0.2); }
    .exp-period {
      font-size: 0.68rem; font-weight: 700; letter-spacing: 0.12em;
      text-transform: uppercase; color: var(--teal);
      background: var(--teal-bg); padding: 4px 10px; border-radius: 99px;
      display: inline-block; margin-bottom: 12px;
    }
    .exp-role { font-family: var(--serif); font-size: 1.1rem; font-weight: 700; margin-bottom: 4px; }
    .exp-company { font-size: 0.78rem; color: var(--muted); margin-bottom: 10px; font-weight: 600; }
    .exp-desc { font-size: 0.82rem; color: var(--muted); line-height: 1.7; }
    .exp-tags { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 14px; }
    .exp-tag { font-size: 0.68rem; font-weight: 600; background: var(--teal-bg); color: var(--teal); padding: 3px 10px; border-radius: 99px; }

    /* EDUCATION */
    .edu-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 22px; }
    .edu-card {
      background: var(--light); border-radius: 14px; padding: 28px;
      border: 1px solid var(--border); transition: transform 0.2s, box-shadow 0.2s;
    }
    .edu-card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(0,0,0,0.07); }
    .edu-icon {
      width: 44px; height: 44px; background: var(--teal); border-radius: 12px;
      display: flex; align-items: center; justify-content: center; margin-bottom: 16px;
    }
    .edu-icon svg { width: 20px; height: 20px; fill: none; stroke: white; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    .edu-year { font-size: 0.68rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: var(--teal); margin-bottom: 8px; }
    .edu-degree { font-family: var(--serif); font-size: 1.05rem; font-weight: 700; margin-bottom: 6px; }
    .edu-inst { font-size: 0.8rem; color: var(--muted); line-height: 1.6; }

    /* PORTFOLIO */
    .proj-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
    .proj-card {
      background: var(--white); border-radius: 14px; border: 1px solid var(--border);
      overflow: hidden; transition: transform 0.2s, box-shadow 0.2s;
    }
    .proj-card:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(0,0,0,0.09); }
    .proj-thumb {
      height: 140px; background: var(--teal-bg);
      display: flex; align-items: center; justify-content: center;
      position: relative; overflow: hidden;
    }
    .proj-num { font-family: var(--serif); font-size: 5rem; font-weight: 900; color: var(--teal); opacity: 0.15; line-height: 1; }
    .proj-icon-big {
      position: absolute; width: 48px; height: 48px; background: var(--teal);
      border-radius: 14px; display: flex; align-items: center; justify-content: center;
    }
    .proj-icon-big svg { width: 22px; height: 22px; fill: none; stroke: white; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    .proj-body { padding: 22px; }
    .proj-name { font-family: var(--serif); font-size: 1rem; font-weight: 700; margin-bottom: 8px; }
    .proj-desc { font-size: 0.78rem; color: var(--muted); line-height: 1.65; margin-bottom: 14px; }
    .proj-tags { display: flex; flex-wrap: wrap; gap: 5px; }
    .proj-tag { font-size: 0.65rem; font-weight: 700; color: var(--teal); background: var(--teal-bg); padding: 3px 9px; border-radius: 99px; }

    /* CONTACT */
    .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: start; }
    .contact-info { display: flex; flex-direction: column; gap: 20px; }
    .contact-item { display: flex; gap: 14px; align-items: flex-start; }
    .contact-ico {
      width: 42px; height: 42px; flex-shrink: 0;
      background: rgba(26,188,156,0.15); border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
    }
    .contact-ico svg { width: 17px; height: 17px; fill: none; stroke: var(--teal); stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    .c-label { font-size: 0.7rem; font-weight: 700; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 3px; }
    .c-value { font-size: 0.88rem; color: white; font-weight: 500; }
    .contact-form { display: flex; flex-direction: column; gap: 14px; }
    .contact-form input, .contact-form textarea {
      width: 100%; background: rgba(255,255,255,0.07);
      border: 1px solid rgba(255,255,255,0.1); border-radius: 10px;
      padding: 13px 18px; font-family: var(--sans); font-size: 0.85rem;
      color: white; outline: none; transition: border-color 0.2s;
    }
    .contact-form input::placeholder, .contact-form textarea::placeholder { color: rgba(255,255,255,0.3); }
    .contact-form input:focus, .contact-form textarea:focus { border-color: var(--teal); }
    .contact-form textarea { resize: vertical; min-height: 110px; }
    .form-message { padding: 12px 16px; border-radius: 8px; margin: 10px 0; font-size: 0.85rem; display: none; }
    .form-message.success { background: rgba(26,188,156,0.2); color: #7ee8d4; display: block; }
    .form-message.error { background: rgba(220,53,69,0.2); color: #ff6b6b; display: block; }
    .btn-submit {
      padding: 12px 30px; background: var(--teal); color: white;
      border: none; border-radius: 10px; font-family: var(--sans); font-size: 0.85rem;
      font-weight: 600; cursor: pointer; transition: background 0.2s, transform 0.2s;
    }
    .btn-submit:hover { background: var(--teal-dark); transform: translateY(-2px); }
    .btn-submit:disabled { opacity: 0.6; cursor: not-allowed; }

    /* FOOTER */
    footer {
      background: #111923; padding: 24px 80px;
      display: flex; justify-content: space-between; align-items: center;
      border-top: 1px solid rgba(255,255,255,0.05);
    }
    footer p { font-size: 0.78rem; color: rgba(255,255,255,0.35); }
    .f-teal { color: var(--teal); font-weight: 600; }

    /* REVEAL */
    .reveal { opacity: 0; transform: translateY(32px); transition: opacity 0.7s ease, transform 0.7s ease; }
    .reveal.visible { opacity: 1; transform: translateY(0); }
  </style>
</head>
<body>

<nav>
  <a href="#home" class="nav-logo"><?php echo htmlspecialchars($resume['personal']['name']); ?></a>
  <ul class="nav-links">
    <li><a href="#home">Home</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#skills">Skills</a></li>
    <li><a href="#experience">Experience</a></li>
    <li><a href="#portfolio">Portfolio</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>
  <div class="nav-socials">
    <a href="https://github.com/Fathi-M1" target="_blank" title="GitHub">
      <svg viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.17 6.839 9.49.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0 1 12 6.836c.85.004 1.705.115 2.504.337 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.167 22 16.418 22 12c0-5.523-4.477-10-10-10z"/></svg>
    </a>
    <a href="https://www.linkedin.com/in/fathimahad/" target="_blank" title="LinkedIn">
      <svg viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
    </a>
    <a href="#contact" title="Email">
      <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
    </a>
  </div>
</nav>

<!-- HERO -->
<section id="home">
  <div class="hero-bg-circle"></div>
  <div class="hero-text">
    <p class="hero-greeting">Hi I am</p>
    <h1><?php echo htmlspecialchars(explode(' ', $resume['personal']['name'])[0]); ?><br/><span><?php echo htmlspecialchars(explode(' ', $resume['personal']['name'])[1]); ?>.</span></h1>
    <p><?php echo htmlspecialchars($resume['personal']['bio']); ?></p>
    <div class="hero-btns">
      <a href="#about" class="btn-teal">About Me</a>
      <a href="#contact" class="btn-outline">Get in Touch</a>
    </div>
  </div>
  <div class="hero-image">
    <img src="imageee.jpeg" alt="<?php echo htmlspecialchars($resume['personal']['name']); ?>"/>
  </div>
  <div class="hero-stats">
    <?php foreach ($resume['personal']['stats'] as $stat): ?>
    <div class="h-stat"><div class="num"><?php echo htmlspecialchars($stat['number']); ?></div><div class="lbl"><?php echo htmlspecialchars($stat['label']); ?></div></div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ABOUT -->
<section id="about" class="section section-light reveal">
  <div class="about-grid">
    <div class="about-images">
      <img class="about-img-main" src="designer.png" alt="<?php echo htmlspecialchars($resume['personal']['name']); ?>"/>
      <img class="about-img-secondary" src="coder.png" alt="<?php echo htmlspecialchars($resume['personal']['name']); ?> alt"/>
      <div class="about-accent"></div>
    </div>
    <div class="about-text">
      <h2 class="sec-title">About <span>Me</span></h2>
      <p class="sec-desc"><?php echo htmlspecialchars($resume['about']['title']); ?></p>
      <div class="about-detail">
        <?php foreach ($resume['about']['details'] as $detail): ?>
        <div class="about-detail-item">
          <div class="label"><?php echo htmlspecialchars($detail['label']); ?></div>
          <div class="value"><?php echo htmlspecialchars($detail['value']); ?></div>
        </div>
        <?php endforeach; ?>
      </div>
      <a href="#skills" class="btn-teal">See My Skills</a>
    </div>
  </div>
</section>

<!-- SKILLS -->
<section id="skills" class="section section-white reveal">
  <h2 class="sec-title">My <span>Skills</span></h2>
  <p class="sec-desc">Technical skills built through coursework, personal projects, and self-directed learning.</p>
  <div class="skills-grid">
    <?php foreach ($resume['skills'] as $index => $skill): ?>
    <div class="skill-card">
      <div class="sk-row"><span class="sk-name"><?php echo htmlspecialchars($skill['name']); ?></span><span class="sk-pct"><?php echo htmlspecialchars($skill['percentage']); ?>%</span></div>
      <div class="sk-bar"><div class="sk-fill" style="width:<?php echo htmlspecialchars($skill['percentage']); ?>%;animation-delay:<?php echo $index * 0.1; ?>s"></div></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- EXPERIENCE -->
<section id="experience" class="section section-light reveal">
  <h2 class="sec-title">My <span>Experience</span></h2>
  <p class="sec-desc">Projects and roles that shaped my approach to building real things.</p>
  <div class="exp-grid">
    <?php foreach ($resume['experience'] as $exp): ?>
    <div class="exp-card">
      <span class="exp-period"><?php echo htmlspecialchars($exp['period']); ?></span>
      <div class="exp-role"><?php echo htmlspecialchars($exp['role']); ?></div>
      <div class="exp-company"><?php echo htmlspecialchars($exp['company']); ?> · <?php echo htmlspecialchars($exp['location']); ?></div>
      <div class="exp-desc"><?php echo htmlspecialchars($exp['description']); ?></div>
      <div class="exp-tags">
        <?php foreach ($exp['tags'] as $tag): ?>
        <span class="exp-tag"><?php echo htmlspecialchars($tag); ?></span>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- EDUCATION -->
<section id="education" class="section section-white reveal">
  <h2 class="sec-title">My <span>Education</span></h2>
  <p class="sec-desc">Academic background and ongoing learning initiatives.</p>
  <div class="edu-grid">
    <?php foreach ($resume['education'] as $edu): ?>
    <div class="edu-card">
      <div class="edu-icon">
        <svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5-10-5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
      </div>
      <div class="edu-year"><?php echo htmlspecialchars($edu['year']); ?></div>
      <div class="edu-degree"><?php echo htmlspecialchars($edu['degree']); ?></div>
      <div class="edu-inst"><?php echo htmlspecialchars($edu['institution']); ?> · <?php echo htmlspecialchars($edu['location']); ?><br/><?php echo htmlspecialchars($edu['details']); ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- PORTFOLIO -->
<section id="portfolio" class="section section-light reveal">
  <h2 class="sec-title">My <span>Portfolio</span></h2>
  <p class="sec-desc">A selection of projects that reflect my thinking and craft.</p>
  <div class="proj-grid">
    <?php foreach ($resume['portfolio'] as $proj): ?>
    <div class="proj-card">
      <div class="proj-thumb">
        <div class="proj-num"><?php echo htmlspecialchars($proj['number']); ?></div>
        <div class="proj-icon-big">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
        </div>
      </div>
      <div class="proj-body">
        <div class="proj-name"><?php echo htmlspecialchars($proj['name']); ?></div>
        <div class="proj-desc"><?php echo htmlspecialchars($proj['description']); ?></div>
        <div class="proj-tags">
          <?php foreach ($proj['tags'] as $tag): ?>
          <span class="proj-tag"><?php echo htmlspecialchars($tag); ?></span>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- CONTACT -->
<section id="contact" class="section section-dark reveal">
  <p class="sec-label">Let's Connect</p>
  <h2 class="sec-title">Get In <span>Touch</span></h2>
  <p class="sec-desc">Open to opportunities, collaborations, and interesting conversations.</p>
  <div class="contact-grid">
    <div class="contact-info">
      <div class="contact-item">
        <div class="contact-ico">
          <svg viewBox="0 0 24 24"><path d="M4 4h16v16H4z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <div><div class="c-label">Email</div><div class="c-value"><?php echo htmlspecialchars($resume['personal']['email']); ?></div></div>
      </div>
      <div class="contact-item">
        <div class="contact-ico">
          <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <div><div class="c-label">Location</div><div class="c-value"><?php echo htmlspecialchars($resume['personal']['location']); ?></div></div>
      </div>
      <div class="contact-item">
        <div class="contact-ico">
          <svg viewBox="0 0 24 24"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
        </div>
        <div><div class="c-label">GitHub</div><div class="c-value"><?php echo htmlspecialchars($resume['personal']['github']); ?></div></div>
      </div>
      <div class="contact-item">
        <div class="contact-ico">
          <svg viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
        </div>
        <div><div class="c-label">LinkedIn</div><div class="c-value"><?php echo htmlspecialchars($resume['personal']['linkedin']); ?></div></div>
      </div>
    </div>
    <div>
      <form id="contactForm" class="contact-form">
        <div id="formMessage" class="form-message"></div>
        <input type="text" id="name" name="name" placeholder="Your Name" required/>
        <input type="email" id="email" name="email" placeholder="Your Email" required/>
        <input type="text" id="subject" name="subject" placeholder="Subject" required/>
        <textarea id="message" name="message" placeholder="Your Message" required></textarea>
        <button type="submit" class="btn-submit">Send Message</button>
      </form>
    </div>
  </div>
</section>

<footer>
  <p>© <?php echo date('Y'); ?> <span class="f-teal"><?php echo htmlspecialchars($resume['personal']['name']); ?></span> · All rights reserved.</p>
  <p>Built with <span class="f-teal">PHP & Modern Web</span> · <?php echo htmlspecialchars($resume['personal']['location']); ?></p>
</footer>

<script>
  // Scroll reveal
  const revealEls = document.querySelectorAll('.reveal');
  const revealObs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.08 });
  revealEls.forEach(r => revealObs.observe(r));

  // Active nav
  const sections = document.querySelectorAll('section[id]');
  const navAs = document.querySelectorAll('.nav-links a');
  window.addEventListener('scroll', () => {
    let cur = '';
    sections.forEach(s => { if (window.scrollY >= s.offsetTop - 80) cur = s.id; });
    navAs.forEach(a => {
      if (a.getAttribute('href') === '#' + cur) a.classList.add('active');
      else a.classList.remove('active');
    });
  });

  // Contact form with AJAX
  document.getElementById('contactForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const form = this;
    const formData = new FormData(form);
    const messageDiv = document.getElementById('formMessage');
    const submitBtn = form.querySelector('.btn-submit');
    
    submitBtn.disabled = true;
    messageDiv.className = 'form-message';
    messageDiv.textContent = 'Sending...';
    messageDiv.style.display = 'block';
    
    try {
      const response = await fetch('handle-contact.php', {
        method: 'POST',
        body: formData
      });
      
      const data = await response.json();
      
      if (data.success) {
        messageDiv.className = 'form-message success';
        messageDiv.textContent = data.message + ' ✓';
        form.reset();
        
        setTimeout(() => {
          messageDiv.style.display = 'none';
          submitBtn.disabled = false;
        }, 3000);
      } else {
        messageDiv.className = 'form-message error';
        messageDiv.textContent = 'Error: ' + (data.errors ? data.errors.join(', ') : data.message);
        submitBtn.disabled = false;
      }
    } catch (error) {
      messageDiv.className = 'form-message error';
      messageDiv.textContent = 'Error sending message. Please try again.';
      submitBtn.disabled = false;
    }
  });
</script>
</body>
</html>
