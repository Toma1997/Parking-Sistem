<div>
    <a href="index.php?stranica=reserve" class="btn btn-primary float-right">
        Produži rezervaciju
    </a>
    <h2>Prvi sprat</h2>
    <div class="content">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Mesto
                    <th>Sektor
                    <th>Vreme rezervacije
            <tbody><!--
            <?//php foreach ($Context->get('appointment') as $appointment ): ?>
                <tr>
                    <td><?//php echo htmlspecialchars($appointment->created_at); ?>
                    <td>
                        <a href="client/parking/<?//php echo $appointment->appointment_id; ?>">
                            <? //php echo htmlspecialchars($appointment->place); ?>
                        </a>
                    <td><?//php echo htmlspecialchars($appointment->next_responder); ?>
            <?//php endforeach; ?>-->
        </table>
    </div>
</div>

<div>
    <h2>Drugi sprat</h2>
    <div class="content">
        <table class="table table-sm">
            <thead>
                <tr>
					<th>Mesto
                    <th>Sektor
                    <th>Vreme rezervacije
            <tbody><!--
            <?//php foreach ($Context->get('appointment') as $appointment ): ?>
                <tr>
                    <td><?//php echo htmlspecialchars($appointment->created_at); ?>
                    <td>
                        <a href="client/parking/<?//php echo $appointment->appointment_id; ?>">
                            <?//php echo htmlspecialchars($appointment->place); ?>
                        </a>
                    <td><?//php echo htmlspecialchars($appointment->next_responder); ?>
            <?//php endforeach; ?>-->
        </table>
    </div>
</div>
