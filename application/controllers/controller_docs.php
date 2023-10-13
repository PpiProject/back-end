<?php

use Shuchkin\SimpleXLSX;


class Controller_Docs extends Controller
{
    public function action_readDoc()
    {
        if ($xlsx = SimpleXLSX::parse('./application/controllers/learnPlanE.xlsx')) {

            $dataArr = $xlsx->rows();
            $resArr = [];

            for ($i = 0; $i < count($dataArr); $i++) {

                if ($i >= 4 && $i <= 79) {

                    $this->logger->pre($dataArr[$i]);

                    $disArr = [
                        'shifrSpec' => $dataArr[$i][0],
                        'nameDiscipline' => $dataArr[$i][5],
                    ];

//                    $this->db->insert('disciplines', $disArr);

                    $resArr[] = [
                        'idDirection' => 4,
                        'idForm' => 1,
                        'exam' => $dataArr[$i][15],
                        'diffTest' => $dataArr[$i][12],
                        'test' => $dataArr[$i][8],
                        'kourseWork' => $dataArr[$i][13],
                        'diplomWork' => $dataArr[$i][16],
                        'testElective' => $dataArr[$i][15],
                        'firstSemesterLect' => intval($dataArr[$i][35]),
                        'firstSemesterPract' => intval($dataArr[$i][41]),
                        'firstSemesterLabs' => intval($dataArr[$i][38]),
                        'secondSemesterLect' => intval($dataArr[$i][57]),
                        'secondSemesterPract' => intval($dataArr[$i][67]),
                        'secondSemesterLabs' => intval($dataArr[$i][64]),
                        'thirdSemesterLect' => intval($dataArr[$i][85]),
                        'thirdSemesterPract' => intval($dataArr[$i][90]),
                        'thirdSemesterLabs' => intval($dataArr[$i][87]),
                        'fourthSemesterLect' => intval($dataArr[$i][109]),
                        'fourthSemesterPract' => intval($dataArr[$i][111]),
                        'fourthSemesterLabs' => intval($dataArr[$i][114]),
                        'fifthSemesterLect' => intval($dataArr[$i][131]),
                        'fifthSemesterPract' => intval($dataArr[$i][135]),
                        'fifthSemesterLabs' => intval($dataArr[$i][133]),
                        'sixthSemesterLect' => intval($dataArr[$i][145]),
                        'sixthSemesterPract' => intval($dataArr[$i][149]),
                        'sixthSemesterLabs' => intval($dataArr[$i][147]),
                        'seventhSemesterLect' => intval($dataArr[$i][159]),
                        'seventhSemesterPract' => intval($dataArr[$i][161]),
                        'seventhSemesterLabs' => intval($dataArr[$i][160]),
                        'eighthSemesterLect' => intval($dataArr[$i][166]),
                        'eighthSemesterPract' => intval($dataArr[$i][169]),
                        'eighthSemesterLabs' => intval($dataArr[$i][168])
                    ];
                }
            }

            $queryDis = "select `id` from `disciplines` where `id` between 351 and 422";

            $disData = $this->db->query($queryDis);
            $this->logger->pre($disData);

            foreach ($disData as $k => $value) {
                $resArr[$k]['idDiscipline'] = $value['id'];
//                $this->db->insert('infodisciplines', $resArr[$k]);
            }

        } else {
            echo SimpleXLSX::parseError();
        }
    }

    public function action_relatedStaff()
    {
        $exceptionsArr = [
            'Б1.В.ДВ.06.1',
            'Б1.В.ДВ.07.1',
            'Б1.В.ДВ.04.1',
            'Б1.В.ДВ.01.1',
            'ФТД.1',
            'Б1.В.02.ДВ.01.1',
            'Б1.В.02.ДВ.02.1',
            'Б1.В.ДВ.02.1',
            'Б1.В.ДВ.03.1',
            'Б1.В.ДВ.05.1',
            'Б1.В.02.ДВ.06.1',
            'Б1.В.02.ДВ.03.1',
            'Б1.В.02.ДВ.04.01',
            'Б1.В.02.ДВ.05.01',
            'ФТД.',
            'Курсовая работа (Проектирование автопредприятий и учебных мастерских, лабораторий и классов)',
            'Курсовая работа (Проектирование автопредприятий и учебных мастерских, лабораторий и классов) защита',
            'Методика профессионального обучения (курсовая работа)',
            'Методика профессионального обучения(курсовая работа) защита',
            'защита', 'Языки и системы программирования (курсовая работа)',
            'Курсовая работа (Языки и системы программирования)',
            'Технология и оборудование ремонта автотранспорта (Курсовая работа)',
            'Курсовая работа (Технология и оборудование ремонта автотранспорта)',
            'Б1.В.02.ДВ.04.1',
            'Б1.В.02.ДВ.08.1',
            'Курсовая работа: Проектирование',
            'Обзорные лекции (методика профессионального обучения)',
            'Обзорные лекции (Общая и профессиональная педагогика)',
            'Б1.В.ДВ.11.1',
            'Б1.В.02.ДВ.07.1',
            '04',
            'Б1.В.ДВ.2.1.',
            'Курсовая работа: Технология швейных изделий',
            'Б1.В.02.ДВ.07.1',
            'Б1.В.ДВ.2.1.',
            '2',
            'Менеджмент (курсовая работа)',
            'Менеджмент ( курсовой работы)',
            'Маркетинг (курсовая работа)',
            'Маркетинг ( курсовой работы)',
            'Обзорные лекции по Методике профессионального обучения',
            'Методика профессионального обучения ( курсовой рботы)'
        ];

        if ($readStaff = SimpleXLSX::parse('./application/controllers/stuffTransport.xlsx')) {
            $disDepartment = $readStaff->rows();
            $clearArr = [];

            foreach ($disDepartment as $k => $value) {
                foreach ($value as $items) {
                    $clearString = trim(str_replace($exceptionsArr, null, $items));
                    if (!empty($clearString)) {
                        $clearArr[] = $clearString;
                    }
                }
            }

            $this->logger->pre($clearArr);

            $selectText = "select `id`, `nameDiscipline` from `disciplines` where `id` between 351 and 422";

            $res = $this->db->query($selectText);
            
            for ($i = 0; $i < count($res); $i++){
                for ($j = 0; $j < count($clearArr); $j++ ){
                    if ($res[$i]['nameDiscipline'] == $clearArr[$j]){

                        $sqlText = "update `infodisciplines` set  `idDepartment` = :idDepartment where `idDiscipline` =:idDiscipline";
                        $arrParams = [
                            'idDepartment' => 3,
                            'idDiscipline' => $res[$i]['id']
                        ];
                        $this->db->query($sqlText, $arrParams);
                    }
                }
            }


        } else {
            echo SimpleXLSX::parseError();
        }
    }
}