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
<article>
    <h1>Comparison of PHP Frameworks and CMS</h1>
    <?php $this->mtime(__FILE__) ?>
    <table id="main-table" summary="Contains comparison of PHP Frameworks and CMS">
        <thead>
        <tr>
            <th scope="col" rowspan="2"><strong>Projects</strong></th>
            <th scope="col" colspan="4"><strong>General</strong></th>
            <th scope="col" colspan="4"><strong>Finances</strong></th>
            <th scope="col" colspan="6"><strong>Development</strong></th>
            <th scope="col" colspan="1"><strong>Comment</strong></th>
        </tr>
        <tr id="positions-tr">
            <th scope="col" data-key="check">Checked</th>
            <th scope="col" data-key="type">Type</th>
            <th scope="col" data-key="popularity">popularity</th>
            <th scope="col" data-key="license">License</th>
            <th scope="col" data-key="company">Company behind</th>
            <th scope="col" data-key="market_share">Market Share</th>
            <th scope="col" data-key="total_value">Total Value</th>
            <th scope="col" data-key="curve">Learning Curve</th>
            <th scope="col" data-key="template">Template</th>
            <th scope="col" data-key="speed">Speed</th>
            <th scope="col" data-key="code_structure">Code Structure</th>
            <th scope="col" data-key="architecture">Architecture</th>
            <th scope="col" data-key="extensions">Extensions</th>
            <th scope="col" data-key="extension_type">Extension Type</th>
            <th scope="col" data-key="conclusion">Conclusion</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($frameworks as $framework): ?>
            <tr>
                <th><a target="_blank" rel="nofollow"
                       href="<?php echo $framework->link ?>"><?php echo $framework->title ?></a></th>
                <td><?php echo $framework->check ?></td>
                <td><?php echo $framework->type ?></td>
                <td><?php \App\Helper::drawStars($framework->popularity, 5) ?></td>
                <td><?php echo $framework->license ?></td>
                <td><?php echo $framework->company_link ? "<a target=\"_blank\" rel=\"nofollow\" href=\"{$framework->company_link}\">{$framework->company}</a>" : $framework->company ?></td>
                <td><?php \App\Helper::drawStars($framework->market_share, 5) ?></td>
                <td><?php echo $framework->total_value ?></td>
                <td><?php \App\Helper::drawStars($framework->curve, 5) ?></td>
                <td><?php echo $framework->template ?></td>
                <td><?php \App\Helper::drawStars($framework->speed, 5) ?></td>
                <td><?php \App\Helper::drawStars($framework->code_structure, 5) ?></td>
                <td><?php echo $framework->architecture ?></td>
                <td><?php \App\Helper::drawStars($framework->extensions, 5) ?></td>
                <td><?php echo $framework->extension_type ?></td>
                <td><?php echo $framework->conclusion ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot></tfoot>
    </table>
</article>