<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/dashboard-head') ?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Mail Service</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $risk['mailservice'] ?></td>
                <td><?php echo $risk['mailservice_description'] ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Email Risk Visuals</h5>
        <div class="row">
            <div class="col-md-12">
                <canvas id="email_risk"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="card" style="margin-top: 20px;">
    <div class="card-body">
        <h5 class="card-title">Email Risk Summary</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-danger">
                    <p><?php echo $risk['email_risks'] ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-info">
                    <p><?php echo $risk['email_risks_solution'] ?></p>
                </div>
            </div>
        </div>
        <h5 class="card-title">Hacked Email Address Solution</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning">
                    <p><?php echo $risk['hacked_email_address']['hacked_email_address_solution'] ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Hacked Email Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        foreach ($risk['hacked_email_address']['hacked_email_address'] as $vul) { ?>
                            <tr>
                                <td><?php echo $index++; ?></td>
                                <td><?php echo $vul; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var lowCount = <?php echo count($risk['email_at_risk_low']); ?>;
    var mediumCount = <?php echo count($risk['email_at_risk_medium']); ?>;
    var highCount = <?php echo count($risk['email_at_risk_high']); ?>;
    const ctx = document.getElementById('email_risk');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Low', 'Medium', 'High'],
            datasets: [{
                label: '# of Email Risk',
                data: [lowCount, mediumCount, highCount],
                borderWidth: 1,
                backgroundColor: ["#f7d5a1", "#a0f2a8", "#b58aa0"],
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?= $this->include('layouts/dashboard-foot') ?>
<?= $this->include('layouts/footer') ?>