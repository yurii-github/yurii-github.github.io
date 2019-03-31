<?php
/**
 * Personal Pages
 *
 * 2017 - 1029 (c) Yurii K.
 */
/**
 * @var \App\EngineInterface $this
 * @var string $content
 * @var string $title
 */
$frameworks = \App\models\Framework::all();
$title = 'Comparison of PHP Frameworks and CMS';
?>
<div class="row">
    <header class="col col-12">
        <h1>Comparison of PHP Frameworks and CMS</h1>
    </header>
</div>
<div class="row">
    <article class="col col-12">
        <table summary="Contains comparison of PHP Frameworks and CMS">
            <thead>
            <tr>
                <th scope="col" rowspan="2"><strong>Projects</strong></th>
                <th scope="col" colspan="3"><strong>General</strong></th>
                <th scope="col" colspan="4"><strong>Finances</strong></th>
                <th scope="col" colspan="2"><strong>Development</strong></th>
                <th scope="col" colspan="1"><strong>Comment</strong></th>
            </tr>
            <tr id="positions-tr">
                <th scope="col">Checked</th>
                <th scope="col">Type</th>
                <th scope="col">Ratings</th>
                <th scope="col">License</th>
                <th scope="col">Company behind</th>
                <th scope="col">Total Value</th>
                <th scope="col">Template</th>
                <th scope="col">Architecture</th>
                <th scope="col">Extension Type</th>
                <th scope="col">Conclusion</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($frameworks as $framework): ?>
                <tr>
                    <th class="ws"><?php echo $framework->link() ?></th>
                    <td class="ws"><?php echo $framework->check ?></td>
                    <td class="ws"><?php echo $framework->type ?></td>
                    <td class="ws">
                        <div title="Code Structure">C<?php $framework->code_structure() ?></div>
                        <div title="Learning Curve">L<?php $framework->curve() ?></div>
                        <div title="Extensions">E<?php $framework->extensions() ?></div>
                        <div title="Market Share">M<?php $framework->market_share() ?></div>
                        <div title="Popularity">P<?php $framework->popularity() ?></div>
                        <div title="Speed">S<?php $framework->speed() ?></div>
                    </td>
                    <td class="ws"><?php echo $framework->license ?></td>
                    <td class="ws"><?php echo $framework->company_link ? "<a target=\"_blank\" rel=\"nofollow\" href=\"{$framework->company_link}\">{$framework->company}</a>" : $framework->company ?></td>
                    <td class="ws"><?php echo $framework->total_value ?></td>
                    <td class="ws"><?php echo $framework->template ?></td>
                    <td class="ws"><?php echo $framework->architecture ?></td>
                    <td class="ws"><?php echo $framework->extension_type ?></td>
                    <td class="ws"><?php echo $framework->conclusion ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot></tfoot>
        </table>
    </article>
</div>