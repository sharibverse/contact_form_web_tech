# 📬 Contact Form Project

**Subject:** Web Development  
**Level:** 2nd Year BCA / BTech  
**Tech Used:** HTML, CSS, JavaScript, PHP

---

## 📁 Project Structure

```
contact_form_project/
├── index.php          ← Main page (the contact form)
├── style.css          ← All the design/styling
├── script.js          ← Form validation (JavaScript)
├── process.php        ← Handles form data & saves it
├── submissions.log    ← All submitted messages saved here

└── README.md          ← This file
```

---

## 💻 How to Run This Project (Step by Step)

### Step 1 — Install XAMPP
- Download from: https://www.apachefriends.org
- Install it (just keep clicking Next)

### Step 2 — Copy Project Folder
- Go to: `C:/xampp/htdocs/`
- Paste your entire `contact_form_project` folder here

### Step 3 — Start XAMPP
- Open **XAMPP Control Panel**
- Click **Start** next to **Apache**
- The button should turn green ✅

### Step 4 — Open in Browser
- Open any browser (Chrome, Firefox)
- Type in address bar: `http://localhost/contact_form_project/`
- Your contact form will open! 🎉

---

## 📝 How It Works

```
User fills form  →  Clicks Submit  →  process.php runs
      →  Data saved in submissions.log  →  Success message shown
```

1. User fills in Name, Email, Phone, Subject, Message
2. JavaScript checks the form (client-side validation)
3. PHP double-checks the form (server-side validation)
4. If everything is correct, data is saved to `submissions.log`
5. Success message is shown to the user

---

## 📂 Where Are Submissions Saved?

Open the file `submissions.log` — every form submission is saved there like this:

```
====================================
Date    : 2026-04-05 14:30:00
Name    : Riya Sharma
Email   : riya@example.com
Phone   : +91 99999 88888
Subject : General Inquiry
IP      : 192.168.1.1
Message :
Hello, I want to know more about your services.
====================================
```

---

## 🧠 Technologies Explained (For Viva)

| Technology | Used For |
|------------|----------|
| HTML       | Structure of the form |
| CSS        | Design, colors, layout |
| JavaScript | Live validation before submit |
| PHP        | Server-side logic, saving data |
| XAMPP      | Local server to run PHP |

---

## ✅ Features of This Project

- Responsive design (works on mobile too)
- Client-side validation (JavaScript)
- Server-side validation (PHP)
- Data saved to text file (no database needed)
- Success & error messages shown to user
- Character counter on message field
- Animated background
- Sticky info panel on desktop

---

## ❓ Common Problems & Fixes

**Form not opening?**
→ Make sure Apache is running (green) in XAMPP

**Submissions not saving?**
→ Right-click `submissions.log` → Properties → make sure it is not Read-Only

**Page showing PHP code instead of form?**
→ You opened the file directly in browser. Always use `http://localhost/contact_form_project/` not the file path.

---

## 👨‍💻 Built With

- HTML5 + CSS3
- Vanilla JavaScript
- PHP 7+
- XAMPP (Apache)
- Google Fonts (Playfair Display + DM Sans)

---

*This project was built as part of a college Web Development assignment.*
