<?php
require_once 'includes/functions.php';

$year = isset($_GET['year']) ? $_GET['year'] : null;
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'votes';
$projects = getProjects($year);

if ($sort === 'date') {
    usort($projects, function($a, $b) {
        return strtotime($b['created_at']) - strtotime($a['created_at']);
    });
} elseif ($sort === 'title') {
    usort($projects, function($a, $b) {
        return strcmp($a['title'], $b['title']);
    });
}

$years = getYears();
$title = 'All Projects';
include 'includes/header.php';
?>

<section class="archive-hero" aria-labelledby="projects-title">
    <div>
        <p class="eyebrow">Project archive</p>
        <h1 id="projects-title">Student projects</h1>
        <p>Browse festival work by year, popularity or title. Each project keeps its description, media, votes and discussion in one place.</p>
    </div>
    <div class="archive-actions">
        <?php if (isTeacher() || isAdmin()): ?>
            <a href="upload.php" class="platform-link primary">Submit a project</a>
        <?php endif; ?>
        <a href="news.php" class="platform-link">Festival news</a>
    </div>
</section>

<div class="archive-toolbar" aria-label="Project filters">
    <form method="GET">
        <label class="visually-hidden" for="project-year">Filter by year</label>
        <select id="project-year" name="year" onchange="this.form.submit()">
            <option value="">All years</option>
            <?php foreach ($years as $yearOption): ?>
                <option value="<?php echo htmlspecialchars($yearOption); ?>" <?php echo $year == $yearOption ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($yearOption); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="sort" value="<?php echo htmlspecialchars($sort); ?>">
    </form>

    <form method="GET">
        <label class="visually-hidden" for="project-sort">Sort projects</label>
        <select id="project-sort" name="sort" onchange="this.form.submit()">
            <option value="votes" <?php echo $sort === 'votes' ? 'selected' : ''; ?>>Most voted</option>
            <option value="date" <?php echo $sort === 'date' ? 'selected' : ''; ?>>Most recent</option>
            <option value="title" <?php echo $sort === 'title' ? 'selected' : ''; ?>>Title A–Z</option>
        </select>
        <input type="hidden" name="year" value="<?php echo htmlspecialchars((string)$year); ?>">
    </form>
</div>

<?php if (empty($projects)): ?>
    <section class="secondary-card" aria-live="polite">
        <p class="eyebrow">No results</p>
        <h2>No projects found</h2>
        <p>
            <?php if ($year): ?>
                No projects were submitted in <?php echo htmlspecialchars($year); ?>.
            <?php else: ?>
                No projects have been published yet.
            <?php endif; ?>
        </p>
    </section>
<?php else: ?>
    <section class="project-archive-grid" aria-label="Published student projects">
        <?php foreach ($projects as $project): ?>
            <article class="project-archive-card">
                <a class="project-archive-link" href="project.php?id=<?php echo (int)$project['id']; ?>">
                    <div class="project-archive-thumb" aria-hidden="true"><i class="fas fa-flask"></i></div>
                    <div class="project-archive-body">
                        <h2><?php echo htmlspecialchars($project['title']); ?></h2>
                        <p>
                            <?php
                            if (!empty($project['description'])) {
                                $description = $project['description'];
                                echo htmlspecialchars(mb_substr($description, 0, 130));
                                echo mb_strlen($description) > 130 ? '…' : '';
                            } else {
                                echo 'Open the project to view its research, media and results.';
                            }
                            ?>
                        </p>
                        <div class="project-archive-meta">
                            <div class="project-archive-meta-row">
                                <span class="badge bg-secondary"><?php echo htmlspecialchars($project['year']); ?></span>
                                <span class="badge bg-danger"><i class="fas fa-heart" aria-hidden="true"></i> <?php echo (int)$project['vote_count']; ?></span>
                            </div>
                            <p class="project-archive-author">By <?php echo htmlspecialchars($project['author_name']); ?></p>
                        </div>
                    </div>
                </a>
            </article>
        <?php endforeach; ?>
    </section>
<?php endif; ?>

<p class="pres-note">
    <?php if (isTeacher() || isAdmin()): ?>
        Submissions are open. <a href="upload.php">Upload a project</a> and add it to the archive.
    <?php else: ?>
        Students can work with a teacher to publish a project on the platform.
    <?php endif; ?>
</p>

<?php include 'includes/footer.php'; ?>
