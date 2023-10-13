<?php


class Controller_Group extends Controller
{
    protected $grop;
    public $db;

    public function __construct()
    {
        $this->grop = new Group();
    }

    public function action_getAllGroupsFullTime()
    {
        $groupsArr = [];

        $request = $this->grop->getAllGroup();

        foreach ($request as $item) {

            if (strpos($item['nameGroup'], '109')){
                $groupsArr['firstCourse'][]= [
                  'id' => $item['idGroup'],
                  'nameGroup' => $item['nameGroup']
                ];
            }

            if (strpos($item['nameGroup'], '209')){
                $groupsArr['secondCourse'][]= [
                    'id' => $item['idGroup'],
                    'nameGroup' => $item['nameGroup']
                ];
            }

            if (strpos($item['nameGroup'], '309')){
                $groupsArr['thirdCourse'][]= [
                    'id' => $item['idGroup'],
                    'nameGroup' => $item['nameGroup']
                ];
            }

            if (strpos($item['nameGroup'], '409')){
                $groupsArr['fourthCourse'][]= [
                    'id' => $item['idGroup'],
                    'nameGroup' => $item['nameGroup']
                ];
            }
        }

        echo json_encode($groupsArr);
    }
}