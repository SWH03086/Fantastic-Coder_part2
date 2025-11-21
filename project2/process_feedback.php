<?php
$feedbackMsg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $feedback = trim($_POST["feedback"] ?? "");
    if (!empty($feedback)) {
        $feedbackMsg = "Thank you for your feedback!";
    } else {
        $feedbackMsg = "Please type something before sending.";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Feedback Box (PHP)</title>
  <style>
    :root{font-family:system-ui,-apple-system,Segoe UI,Roboto,'Helvetica Neue',Arial;}
    body{display:flex;align-items:center;justify-content:center;min-height:100vh;margin:0;background:#f6f8fa}
    .card{background:white;border-radius:12px;box-shadow:0 6px 20px rgba(20,30,50,.08);padding:24px;max-width:520px;width:90%}
    h1{font-size:18px;margin:0 0 12px}
    label{display:block;font-size:14px;color:#333;margin-bottom:8px}
    textarea{width:100%;min-height:110px;padding:10px;border:1px solid #dbe3ea;border-radius:8px;resize:vertical;font-size:14px}
    .row{display:flex;gap:8px;align-items:center;margin-top:12px}
    button{background:#0b79f7;color:#fff;border:0;padding:10px 14px;border-radius:10px;font-weight:600;cursor:pointer}
    .msg{margin-top:12px;font-size:14px;min-height:22px;color:#0a7d34;font-weight:600}
    .error{color:#c00000;font-weight:600}
  </style>
</head>
<body>
  <main class="card" role="main">
    <?php if(!empty($feedbackMsg) && $feedbackMsg === "Thank you for your feedback!"): ?>
      <h1><?php echo $feedbackMsg; ?></h1>
    <?php else: ?>
      <h1>Send us feedback</h1>
      <form method="POST" action="index.php">
        <label for="feedback">Your feedback</label>
        <textarea id="feedback" name="feedback" placeholder="Type your message here..." required></textarea>
        <div class="row">
          <button type="submit">Send</button>
        </div>
        <?php if(!empty($feedbackMsg)): ?>
          <div class="msg error">
            <?php echo htmlspecialchars($feedbackMsg); ?>
          </div>
        <?php endif; ?>
      </form>
    <?php endif; ?>
    <a href="index.php" style="margin-top:16px;display:inline-block;font-size:14px;color:#0b79f7;text-decoration:none;">Back to Home</a>
  </main>
</body>
</html>
