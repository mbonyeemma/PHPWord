<?php
include_once 'Sample_Header.php';

// New Word Document
echo date('H:i:s') , ' Create new PhpWord object' , EOL;
$phpWord = new \PhpOffice\PhpWord\PhpWord();

$section = $phpWord->addSection();

// In section
$textbox = $section->addTextBox(array('align' => 'left', 'width' => 400, 'borderSize' => 1, 'borderColor' => '#FF0000'));
$textbox->addText('Text box content in section.');
$textbox->addText('Another line.');

// Inside table
$section->addTextBreak(2);
$cell = $section->addTable()->addRow()->addCell(300);
$textbox = $cell->addTextBox(array('borderSize' => 1, 'borderColor' => '#0000FF', 'innerMargin' => 100));
$textbox->addText('Inside table');

// Inside header with textrun
$header = $section->addHeader();
$textbox = $header->addTextBox(array('align' => 'center', 'width' => 600, 'borderSize' => 1, 'borderColor' => '#00FF00'));
$textrun = $textbox->addTextRun();
$textrun->addText('TextBox in header. TextBox can contain a TextRun ');
$textrun->addText('with bold text', array('bold' => true));
$textrun->addText(', ');
$textrun->addLink('http://www.google.com', 'link');
$textrun->addText(', and image ');
$textrun->addImage('resources/_earth.jpg', array('width' => 18, 'height' => 18));
$textrun->addText('.');

// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI) {
    include_once 'Sample_Footer.php';
}
