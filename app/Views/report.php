<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/dashboard-head') ?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Industry</th>
                <th>Email</th>
                <th>Website</th>
                <th>Status</th>
                <th>Final Score</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $report['client_industry'] ?></td>
                <td><?php echo $report['client_email'] ?></td>
                <td><?php echo $report['client_web_ip'] ?></td>
                <td><span class="badge badge-danger"><?php echo $report['status'] ?></span></td>
                <td><span class="badge badge-info"><?php echo $report['final_score'] ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Vulnerablity Count</h5>
        <div class="row">
            <div class="col-md-3">
                <button type="button" class="btn btn-primary">Low <span class="badge badge-background-primary"><?php echo $report['Low_vuln'] ?></span></button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-primary btn-danger">Medium <span class="badge badge-background-primary"><?php echo $report['Medium_vuln'] ?></span></button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-primary btn-success">High <span class="badge badge-background-primary"><?php echo $report['High_vuln'] ?></span></button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-primary btn-warning">Critical <span class="badge badge-background-primary"><?php echo $report['Critical_vuln'] ?></span></button>
            </div>
        </div>
    </div>
</div>
<div class="card" style="margin-top: 20px;">
    <div class="card-body">
        <h5 class="card-title">Vulnerablity Summary</h5>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Severity</th>
                            <th>URI</th>
                            <th>CVE</th>
                            <th>Alert</th>
                            <th>Description</th>
                            <th>Solution</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($report['Vulnerability'] as $vul) { ?>
                            <tr>
                                <td><?php echo $vul['severity']; ?></td>
                                <td><?php echo $vul['uri']; ?></td>
                                <td><?php echo $vul['CVE'] ?></td>
                                <td><?php echo $vul['alert']; ?></td>
                                <td><?php echo $vul['description'] ?></td>
                                <td><?php echo $vul['solution'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->include('layouts/dashboard-foot') ?>
<?= $this->include('layouts/footer') ?>