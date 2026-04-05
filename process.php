<?php
// ============================================
//  CONTACT FORM — process.php
//  Saves submissions to submissions.log only.
//  No email / PHPMailer required.
// ============================================

// ── Step 1: Only allow POST requests ────────
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// ── Step 2: Collect & sanitize inputs ───────
$name    = htmlspecialchars(trim($_POST['name']    ?? ''));
$email   = htmlspecialchars(trim($_POST['email']   ?? ''));
$phone   = htmlspecialchars(trim($_POST['phone']   ?? ''));
$subject = htmlspecialchars(trim($_POST['subject'] ?? ''));
$message = htmlspecialchars(trim($_POST['message'] ?? ''));
$consent = isset($_POST['consent']);

$old = compact('name', 'email', 'phone', 'subject', 'message');

// ── Step 3: Server-side validation ──────────
$errors = [];

if (empty($name) || strlen($name) < 2)
    $errors[] = 'Please enter your full name (at least 2 characters).';

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
    $errors[] = 'Please enter a valid email address.';

if (empty($subject))
    $errors[] = 'Please select a subject.';

if (empty($message) || strlen($message) < 10)
    $errors[] = 'Message must be at least 10 characters.';

if (!$consent)
    $errors[] = 'You must agree to the Privacy Policy.';

// ── Step 4: If errors, go back to form ──────
if (!empty($errors)) {
    $error   = implode(' | ', $errors);
    $success = false;
    include 'index.php';
    exit;
}

// ── Step 5: Save submission to text log file ─
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';

$logEntry  = "====================================\n";
$logEntry .= "Date    : " . date('Y-m-d H:i:s') . "\n";
$logEntry .= "Name    : $name\n";
$logEntry .= "Email   : $email\n";
$logEntry .= "Phone   : " . ($phone ?: 'Not provided') . "\n";
$logEntry .= "Subject : $subject\n";
$logEntry .= "IP      : $ip\n";
$logEntry .= "Message :\n$message\n";
$logEntry .= "====================================\n\n";

$saved = (bool) file_put_contents('submissions.log', $logEntry, FILE_APPEND | LOCK_EX);

// ── Step 6: Show result ──────────────────────
$success = $saved;
$error   = $saved ? false : 'Could not save your message. Please check server file permissions.';
$old     = [];

include 'index.php';
exit;
?>
