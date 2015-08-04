<?php
class timedbuy_mdl_businessactivity extends dbeav_model{
    function getGidByTimedbuy($status){
        $nowTime = time();
        $sql = "select g.gid as gid from sdb_timedbuy_businessactivity as g".
        " join sdb_timedbuy_activity as s on s.act_id=g.aid".
        " where g.status='".$status."' and s.act_open='true' and {$nowTime} <= s.end_time";
        $result = $this->db->select($sql);
        if ($result && !empty($result)){
            foreach($result as $k=>$v){
                $goods_ids[] = $v['gid'];
            }
            return $goods_ids;
        }else{
            return false;
        }
    }


	function _filter($filter,$tbase=''){
        //按商品名称搜索
        if(isset($filter['gname']) && $filter['gname'] != ''){
            $gObj = app::get('b2c')->model('goods');
            $goods = $gObj->getList('goods_id',array('name|has'=>$filter['gname']));
            $gids = array();
            foreach($goods as $k=>$v){
                $gids[] = $v['goods_id'];
            }
            unset($filter['gname']);
            $filter['gid'] = $gids;
        }

        //店铺名称搜索
        if(isset($filter['stname']) && $filter['stname'] != ''){
            $stObj = app::get('business')->model('storemanger');
            $stores = $stObj->getList('store_id',array('store_name|has'=>$filter['stname']));
            $store_ids = array();
            foreach($stores as $k=>$v){
                $store_ids[] = $v['store_id'];
            }
            unset($filter['stname']);
            $filter['store_id'] = $store_ids;
        }
		 //活动名称搜索
        if(isset($filter['actname']) && $filter['actname'] != ''){
            $actObj = app::get('timedbuy')->model('activity');
            $actInfo = $actObj->getList('act_id',array('name|has'=>$filter['actname']));
            $act_ids = array();
            foreach($actInfo as $k=>$v){
                $act_ids[] = $v['act_id'];
            }
            unset($filter['actname']);
            $filter['aid'] = $act_ids;
        }

        if($this->use_meta){
            foreach(array_keys((array)$filter) as $col){
                if(in_array(strval($col),$this->metaColumn)){
                    $meta_filter[$col] = $filter[$col];
                    unset($filter[$col]);  #ȥfilterаmeta
                    $obj_meta = new dbeav_meta($this->table_name(true),$col);
                    $meta_filter_ret .= $obj_meta->filter($meta_filter);
                }
            }
        }
        $dbeav_filter = kernel::single('dbeav_filter');
        $dbeav_filter_ret = $dbeav_filter->dbeav_filter_parser($filter,$tableAlias,$baseWhere,$this);
        if($this->use_meta){
            return $dbeav_filter_ret.$meta_filter_ret;
        }
        return $dbeav_filter_ret;
    }


	function searchOptions(){
        $columns = array();
        foreach($this->_columns() as $k=>$v){
            if(isset($v['searchtype']) && $v['searchtype']){
                $columns[$k] = $v['label'];
            }
        }

        $virtul = array('gname'=>'商品名称','stname'=>'店铺名称','actname'=>'活动名称');

        return array_merge($columns,$virtul);
    }
}