<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/dashboard-head') ?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Defense</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $threat['system_defense'] ?></td>
                <td><?php echo $threat['system_defense_description'] ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="card" style="margin-top: 20px;">
    <div class="card-body">
        <h5 class="card-title">Threat</h5>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Threat</th>
                            <th>Attack Complexity</th>
                            <th>Confidentiality Impact</th>
                            <th>Description</th>
                            <th>Geolocation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($threat['vulnerability_threat'] as $vul) { ?>
                            <tr>
                                <td><?php echo $vul['threat']; ?></td>
                                <td><?php echo $vul['threat_attackcomplexity']; ?></td>
                                <td><?php echo $vul['threat_confidentialityimpact'] ?></td>
                                <td><?php echo $vul['threat_description']; ?></td>
                                <td><?php echo $vul['threat_geolocation'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-title">Threats Visuals</h5>
                <canvas id="sub_threats"></canvas>
            </div>
            <div class="col-md-6">
                <h5 class="card-title">Solutions</h5>
                <div class="alert alert-warning">
                    <p><?php echo $threat['SSL_Certificate_Expired']['SSL_Certificate_Expired_solution'] ?></p>
                </div>
                <div class="alert alert-danger">
                    <p><?php echo $threat['co_shared_hosts']['Co_Hosted_Site_solution'] ?></p>
                </div>               
            </div>
        </div>
    </div>
</div>
<div class="card" style="margin-top: 20px;">
    <div class="card-body">
        <h5 class="card-title">Sub-domain Threat</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <p><?php echo $threat['subdomain_threat']['subdomain_threat'] ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" style="overflow: auto;">
                    <thead>
                        <tr>
                            <?php
                            $nowOfCol = 0;
                            for ($i = 0; $i < ceil(count($threat['subdomain_threat']['subdomains']) / 10); $i++) {
                                $nowOfCol++; ?>
                                <th style="white-space: nowrap;">Sr. No</th>
                                <th style="white-space: nowrap;">Sub Domain</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $threat['subdomain_threat']['subdomains'];
                        $domCount = 1;
                        $index = 0;
                        $iterationOver = false;
                        for ($i = 0; $i < count($result); $i++) {
                            echo '<tr>';
                            for ($j = 0; $j < $nowOfCol; $j++) {
                                if ($index === count($result)) {
                                    $iterationOver = true;
                                    break;
                                }
                                echo '<td>' . $domCount++ . '</td>';
                                echo '<td style="white-space:nowrap;">' . $result[$index] . '</td>';
                                $index++;
                            }
                            echo '</tr>';
                            if ($iterationOver) {
                                break;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card" style="margin-top: 20px;">
    <div class="card-body">
        <h5 class="card-title">Human Name Threat</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-danger">
                    <p><?php echo $threat['human_name']['human_name_solution'] ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-info">
                    <p><?php echo $threat['human_name']['human_name_threat'] ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <?php
                            $nowOfCol = 0;
                            for ($i = 0; $i < ceil(count($threat['human_name']['human_name_list']) / 10); $i++) {
                                $nowOfCol++; ?>
                                <th style="white-space: nowrap;">Sr. No</th>
                                <th style="white-space: nowrap;">Names</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $threat['human_name']['human_name_list'];
                        $domCount = 1;
                        $index = 0;
                        $iterationOver = false;
                        for ($i = 0; $i < count($result); $i++) {
                            echo '<tr>';
                            for ($j = 0; $j < $nowOfCol; $j++) {
                                if ($index === count($result)) {
                                    $iterationOver = true;
                                    break;
                                }
                                echo '<td>' . $domCount++ . '</td>';
                                echo '<td style="white-space:nowrap;">' . $result[$index] . '</td>';
                                $index++;
                            }
                            echo '</tr>';
                            if ($iterationOver) {
                                break;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var sslCount = <?php echo count($threat['SSL_Certificate_Expired']['SSL_Certificate_Expired']) ?>;
    var tcpCount = <?php echo count($threat['Open_TCP_Port']) ?>;
    var hostCount = <?php echo count($threat['co_shared_hosts']['Co_Hosted_Site_List']) ?>;
    const ctx = document.getElementById('sub_threats');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['SSL Certificate Expired', 'Open TCP Port', 'Co Shared Host'],
            datasets: [{
                label: '# of Threats',
                data: [sslCount, tcpCount, hostCount],
                borderWidth: 1,
                backgroundColor: ["#d5d975", "#e691b5", "#4b92e3"],
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