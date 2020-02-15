<div class="container">
    <div class="m-2">
        <a href="/src/" class="btn btn-primary">Back</a>
    </div>
    <table class="table table-striped">
        <thead class="thead-light ">
            <tr>
                <th>Photo</th>
                <th>Full name</th>
                <th>Report Subject</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $member) : ?>
                <tr>
                    <td><img src="<?=$member['photo']?>" alt="Photo"></td>
                    <td><?=$member['firstname'] . " " . $member['lastname']?></td>
                    <td><?=$member['report_subject']?></td>
                    <td><a href="mailto:<?=$member['email']?>"><?=$member['email']?></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>