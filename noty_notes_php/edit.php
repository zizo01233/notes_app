<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM notes WHERE id = ?");
$stmt->execute([$id]);
$note = $stmt->fetch();

if (!$note) {
    die("Note not found.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("UPDATE notes SET title = ?, category = ?, content = ? WHERE id = ?");
    $stmt->execute([$title, $category, $content, $id]);

    header("Location: index.php");
    exit;
}

include 'header.php';
?>

<main style="padding: 2rem;">
  <h2>Edit Note</h2>
  <form method="post">
    <label>Title:</label><br>
    <input type="text" name="title" value="<?= htmlspecialchars($note['title']) ?>" required><br><br>
    <label>Category:</label><br>
    <input type="text" name="category" value="<?= htmlspecialchars($note['category']) ?>"><br><br>
    <label>Content:</label><br>
    <textarea name="content" rows="6" required><?= htmlspecialchars($note['content']) ?></textarea><br><br>
    <button type="submit">Update</button>
  </form>
</main>

<?php include 'footer.php'; ?>