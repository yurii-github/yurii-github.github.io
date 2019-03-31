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

$title = 'Add Prefix';
?>

<style>
    input {
        margin: 20px;
    }
</style>

<article>
    <h1>Add Prefix/Suffix into Each Line</h1>

    <noscript>You need to enable JavaScript to run this app.</noscript>

    <textarea id="input" style="width:100%; margin:7px 0px 4px 0px;" rows="10"></textarea>
    <input class="btn" type="text" id="prefix" value="     * " placeholder="Enter prefix here."/>
    <input type="text" id="suffix" value="" placeholder="Enter suffix here."/>
    <input type="button" value="Add Prefix and/or Suffix" onClick="addpresufx();"/>
    <textarea id="output" style="width:100%;" rows="10" wrap="off"></textarea>
</article>
<script>

    function addpresufx() {
        var prfx = document.getElementById('prefix').value;
        var sufx = document.getElementById('suffix').value;
        var text = document.getElementById('input').value;

        text = text.replace(/\r/g, '');
        text = text.split(/\n/);
        var textlen = text.length;
        var textarrout = [];

        for (var x = 0; x < textlen; x++) {
            textarrout[x] = prfx + text[x] + sufx;
        }
        textout = textarrout.join('\n');
        document.getElementById('output').value = textout;
    }
</script>