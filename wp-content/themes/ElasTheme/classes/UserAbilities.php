<?php

//class UserAbilities{
//
//    /**
//     * @param $currentUserRole array
//     *   => [ 'administrator' => true ]
//     *   => [ 'basic' => true ]
//     * @param $blockRoles array
//     *   => [ 'basic', 'advanced' ]
//     *   => [ 'basic' ]
//     * @return bool
//     */
////    public static function canReadSectionSecondBlock($currentUserRoles){
////        var_dump($currentUserRoles);
////        return (isset( $currentUserRoles['administrator'] ) && $currentUserRoles['administrator']);
////    }
//
//    public static function isAdmin($currentUserRoles){
//        return (isset( $currentUserRoles['administrator'] ) && $currentUserRoles['administrator']);
//    }
//
//    public static function canReadBlock($currentUserRoles, $blockRoles){
//        if (static::isAdmin($currentUserRoles)){
//            return true;
//        }
//
//        if (!is_array($blockRoles)) {
//            $blockRoles = array();
//        }
//
//        foreach ($blockRoles as $blockRole){
//            /** @var $blockRole string */
//            if (isset( $currentUserRoles[$blockRole] ) && $currentUserRoles[$blockRole]){
//                return true;
//            }
//        }
//
//
//        return false;
//    }
//}
//
///// just preview
//class FilterPostsByRole{
//
//}