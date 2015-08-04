<?php 

$db['activity'] = array(
    'columns'=>array(
        'act_id'=>array(
            'type'=>'mediumint(8)',
            'extra'=>'auto_increment',
            'pkey'=>'true',
            'label'=>__('序号'),
            'in_list'=>true,
        ),
        'name'=>array(
            'type'=>'varchar(200)',
            'label'=>__('活动名称'),
            'editale'=>false,
            'in_list'=>true,
            'default_in_list'=>true,
        		'searchtype' => 'has',
        		'filtertype' => 'custom',
        		'filterdefault' => true,
        ),
        'act_tag'=>array(
            'type'=>'varchar(200)',
            'label'=>__('活动标签'),
            'editale'=>false,
            'in_list'=>true,
            'default_in_list'=>true,
        		'searchtype' => 'has',
        		'filtertype' => 'custom',
        		'filterdefault' => true,
        ),
        'price_tag'=>array(
            'type'=>'varchar(200)',
            'label'=>__('价格标签'),
            'editale'=>false,
            'in_list'=>true,
            'default_in_list'=>true,
        		'searchtype' => 'has',
        		'filtertype' => 'custom',
        		'filterdefault' => true,
        ),
        'store_lv'=>array(
            'type'=>'varchar(200)',
            'label'=>__('店铺等级'),
            'editable'=>false,
            'in_list'=>false,
            'default_in_list'=>false,
        ),
        'store_type'=>array(
            'type'=>'varchar(200)',
            'label'=>__('店铺类型'),
            'editable'=>false,
            'in_list'=>false,
            'default_in_list'=>false,
        ),
        'description'=>array(
            'type'=>'text',
            'label'=>__('活动描述'),
            'editable'=>false,
            'in_list'=>true,
            'default_in_list'=>true,
        ),
        'start_time'=>array(
            'type'=>'time',
            'label'=>__('活动开始时间'),
            'editable'=>false,
            'in_list'=>true,
            'default_in_list'=>true,
        ),
        'end_time'=>array(
            'type'=>'time',
            'label'=>__('活动结束时间'),
            'editable'=>false,
            'in_list'=>true,
            'default_in_list'=>true,
        ),
        'business_type'=>array(
            'type'=>'varchar(200)',
            'label'=>__('商户经营范围'),
            'editable'=>false,
            'in_list'=>false,
        ),
        'act_open'=>array(
            'type' => 'bool',
            'default' => 'false',
            'label'=>__('活动开启状态'),
            'editable' => false,
            'required' => false,
            'in_list'=>true,
            'default_in_list'=>true,
        ),
        'last_modified'=>array(
            'type'=>'time',
            'label'=>__('最后修改时间'),
            'editable'=>false,
            'required'=>false,
        ),
		'active_status'=>array(
			'type'=>array(
				'start'=>'未开始',
				'active'=>'进行中',
				'end'=>'已结束',
			),
			'label'=>__('活动状态'),
		    'in_list'=>true,
            'default_in_list' => true,
			
		),
		'disabled'=>array(
			'type'=>'bool',
			'default'=>'false',
		),
    ),
);