<?php
include 'db.php';
include 'header.php';

// Fetch all notes
$stmt = $pdo->query("SELECT * FROM notes ORDER BY created_at DESC");
$notes = $stmt->fetchAll();
?>

<main style="padding: 2rem;">
  <h2>All Notes</h2>
  <a href="add.php">+ Add New Note</a>
  <ul>
    <?php foreach ($notes as $note): ?>
      <li>
        <strong><?= htmlspecialchars($note['title']) ?></strong> (<?= $note['category'] ?>)<br>
        <?= nl2br(htmlspecialchars(substr($note['content'], 0, 100))) ?>...
        <br><a href="edit.php?id=<?= $note['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $note['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        <hr>
      </li>
    <?php endforeach; ?>
  </ul>
</main>

<?php include 'footer.php'; ?>