<?php
/* @var $this MtbUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

//$this->menu=array(
//	array('label'=>'Buat User', 'url'=>array('create')),
//	array('label'=>'Manajemen User', 'url'=>array('admin')),
//);
?>



<h1>Daftar User</h1>
<?php $post_html = '</tbody></table>'; ?>
<?php $this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'template'=>"{summary}\n{sorter}\n{items}</tbody></table>\n{pager}",
)); ?>

