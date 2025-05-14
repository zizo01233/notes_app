<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];

    $stmt = $pdo->prepare("INSERT INTO notes (title, content, category) VALUES (?, ?, ?)");
    $stmt->execute([$title, $content, $category]);

    header("Location: index.php");
    exit;
}

include 'header.php';
?>

<main style="padding: 2rem;">
  <h2>Add New Note</h2>
  <form method="post">
    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>
    <label>Category:</label><br>
    <input type="text" name="category"><br><br>
    <label>Content:</label><br>
    <textarea name="content" rows="6" required></textarea><br><br>
    <button type="submit">Save</button>
  </form>
</main>

<?php include 'footer.php'; ?>