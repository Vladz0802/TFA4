<?php $active = 'about'; ?>
<?= $this->include('layouts/header') ?>

<div class="about-grid">
    <section>
        <h1>Built for the counter, not a data center</h1>
        <p>
            Corner Shop POS started as a notebook under the register — a
            running list of regular customers and the staff taking shifts.
            This project turns that notebook into a small web app, one page
            at a time, so the store can eventually track sales without
            losing the simplicity that made the notebook work in the first
            place.
        </p>
        <p>
            This first version has no database. Customer and staff records
            live in static PHP arrays inside their controllers, which is
            enough to prove the routes, controllers, and views work together
            before real storage is introduced.
        </p>
    </section>
    <aside>
        <h2>At a glance</h2>
        <ul class="fact-list">
            <li><span class="k">Framework</span><span class="v">CodeIgniter 4</span></li>
            <li><span class="k">Data source</span><span class="v">Static PHP arrays</span></li>
            <li><span class="k">Pages live</span><span class="v">Home, About, Customers, Staff</span></li>
            <li><span class="k">Next phase</span><span class="v">Database-backed records</span></li>
        </ul>
    </aside>
</div>

<?= $this->include('layouts/footer') ?>
