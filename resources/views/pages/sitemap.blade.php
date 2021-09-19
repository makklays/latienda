<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php foreach( config('app.available_locales') as $k => $lang ): ?>
    <url>
        <loc><?=config('app.url')?>/{{ $lang }}</loc>
        <lastmod>2021-05-24T16:05:00+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc><?=config('app.url')?>/{{ $lang }}/about-us</loc>
        <lastmod>2021-05-24T16:05:00+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc><?=config('app.url')?>/{{ $lang }}/contacts</loc>
        <lastmod>2021-05-24T16:05:00+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <?php endforeach; ?>

    <?php $langs = config('app.available_locales'); ?>
    <?php foreach($langs as $lg): ?>
        <?php foreach($categories as $key => $item): ?>
        <url>
            <loc><?=config('app.url')?>/{{ $lg }}/<?=$item->slug?></loc>
            <lastmod><?=date('Y-m-d', strtotime($item->created_at))?>T<?=date('H:i:s', strtotime($item->created_at))?>+00:00</lastmod>
            <priority>0.64</priority>
        </url>
        <?php endforeach; ?>
    <?php endforeach; ?>
</urlset>
