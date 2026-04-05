<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>
</head>
<body>

  <div class="bg-blobs">
    <div class="blob blob1"></div>
    <div class="blob blob2"></div>
    <div class="blob blob3"></div>
  </div>

  <div class="page-wrapper">

    <!-- Left Panel -->
    <div class="info-panel">
      <div class="logo">✦ ConnectHub</div>
      <h1 class="headline">Let's start a<br/><span class="accent">conversation.</span></h1>
      <p class="subtext">We're here to help, collaborate, or just chat. Drop us a message and we'll respond within 24 hours.</p>

      <div class="contact-details">
        <div class="detail-item">
          <span class="icon">✉</span>
          <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="19717c757576597a7677777c7a6d716c7b377a7674">[email&#160;protected]</a></span>
        </div>
        <div class="detail-item">
          <span class="icon">📍</span>
          <span>Greater Noida, UP, India</span>
        </div>
        <div class="detail-item">
          <span class="icon">📞</span>
          <span>+91 98765 43210</span>
        </div>
      </div>

      <div class="socials">
        <a href="#" class="social-btn">in</a>
        <a href="#" class="social-btn">tw</a>
        <a href="#" class="social-btn">ig</a>
      </div>
    </div>

    <!-- Right Panel - Form -->
    <div class="form-panel">
      <div class="form-card">
        <h2 class="form-title">Send a Message</h2>
        <p class="form-sub">All fields marked <span class="req">*</span> are required.</p>

        <!-- SUCCESS / ERROR MESSAGES (shown by PHP) -->
        <?php if(isset($success) && $success): ?>
          <div class="alert alert-success">✔ Message sent! We'll get back to you soon.</div>
        <?php elseif(isset($error) && $error): ?>
          <div class="alert alert-error">✖ <?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="process.php" method="POST" id="contactForm" novalidate>

          <div class="form-row">
            <div class="form-group">
              <label for="name">Full Name <span class="req">*</span></label>
              <input type="text" id="name" name="name" placeholder="Riya Sharma"
                value="<?php echo isset($old['name']) ? htmlspecialchars($old['name']) : ''; ?>"
                required />
              <span class="field-error" id="nameErr"></span>
            </div>
            <div class="form-group">
              <label for="email">Email Address <span class="req">*</span></label>
              <input type="email" id="email" name="email" placeholder="riya@example.com"
                value="<?php echo isset($old['email']) ? htmlspecialchars($old['email']) : ''; ?>"
                required />
              <span class="field-error" id="emailErr"></span>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="tel" id="phone" name="phone" placeholder="+91 99999 88888"
                value="<?php echo isset($old['phone']) ? htmlspecialchars($old['phone']) : ''; ?>" />
            </div>
            <div class="form-group">
              <label for="subject">Subject <span class="req">*</span></label>
              <select id="subject" name="subject" required>
                <option value="">— Select a topic —</option>
                <option value="General Inquiry" <?php echo (isset($old['subject']) && $old['subject']=='General Inquiry') ? 'selected' : ''; ?>>General Inquiry</option>
                <option value="Project Collaboration" <?php echo (isset($old['subject']) && $old['subject']=='Project Collaboration') ? 'selected' : ''; ?>>Project Collaboration</option>
                <option value="Technical Support" <?php echo (isset($old['subject']) && $old['subject']=='Technical Support') ? 'selected' : ''; ?>>Technical Support</option>
                <option value="Feedback" <?php echo (isset($old['subject']) && $old['subject']=='Feedback') ? 'selected' : ''; ?>>Feedback</option>
                <option value="Other" <?php echo (isset($old['subject']) && $old['subject']=='Other') ? 'selected' : ''; ?>>Other</option>
              </select>
              <span class="field-error" id="subjectErr"></span>
            </div>
          </div>

          <div class="form-group full">
            <label for="message">Message <span class="req">*</span></label>
            <textarea id="message" name="message" rows="5"
              placeholder="Write your message here..." required><?php echo isset($old['message']) ? htmlspecialchars($old['message']) : ''; ?></textarea>
            <div class="char-count"><span id="charCount">0</span> / 500 characters</div>
            <span class="field-error" id="msgErr"></span>
          </div>

          <div class="form-group full checkbox-group">
            <label class="checkbox-label">
              <input type="checkbox" name="consent" id="consent" required />
              <span>I agree to the <a href="#">Privacy Policy</a> and consent to being contacted.</span>
            </label>
            <span class="field-error" id="consentErr"></span>
          </div>

          <button type="submit" class="btn-submit" id="submitBtn">
            <span class="btn-text">Send Message</span>
            <span class="btn-arrow">→</span>
