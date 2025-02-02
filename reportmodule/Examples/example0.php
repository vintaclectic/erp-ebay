<?php // content="text/plain; charset=utf-8"
require_once ('../jpgraph.php');
require_once ('../jpgraph_line.php');

// Some data
$ydata = array(11,3,8,12,5,1,9,13,5,7,2,2,5,5,8,9,6,2,1,3,89);

// Create the graph. These two calls are always required
$graph = new Graph(350,250);
$graph->SetScale('textlin');

// Create the linear plot
$lineplot=new LinePlot($ydata);
$lineplot->SetColor('blue');

// Add the plot to the graph
$graph->Add($lineplot);

// Display the graph
$graph->Stroke();
?>
