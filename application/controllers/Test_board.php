<?php

/**
 * Created by PhpStorm.
 * User: siri
 * Date: 2018-01-05
 * Time: 오후 2:09
 */
class Test_Board extends CI_Controller
{
    //디비연결 및 모델 접속(객체생성)
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Test_Board_M');
    }

    //유저 리스트 출력
    function b_list(){
        //select *
        $array1 = $this->Test_Board_M->info_list();

        //뷰로 보낼 리스트 배열
        $array = array();
        //페이지 번호들
        $page_arr = array();
        //한 페이지에 출력할 리스트 갯수
        $list_num = 5;
        //페이지 네이션 마지막 숫자
        $last = ceil(sizeof($array1)/$list_num);
        $page_select = isset($_GET['page'])? $_GET['page'] : 1;
        $page_start = $page_select%3 == 0? (floor($page_select/3))*3-2 : (floor($page_select/3) + 1)*3-2;
        $start = ($page_select-1)*$list_num;
        $page_end = $page_start+2 <= $last? $page_start+2 : $last;
        $end = $start+($list_num-1) < sizeof($array1)? $start+$list_num : sizeof($array1);
        // < 버튼
        $before = $last > 3 && $page_start > 3 ? $page_start-3 : $page_select;
        // > 버튼
        $after = $last > 3 && $page_start < $last-3 ? $page_start+3 : $page_select;

        //array1에서 리스트를 골라 array에 저장
        for($i = $start ;$i < $end; $i++)
        {
            array_push($array, $array1[$i]);
        }

        //페이지네이션 할 숫자 들 저장
        for($i = 0, $j = $page_start; $j <= $page_end ; $i++, $j++){
            $page_arr[$i] = $j;
        }
        // < 버튼 저장
        array_unshift($page_arr, $after);
        // > 버튼 저장
        array_unshift($page_arr, $before);
        
        $this->load->view('T_B_list', array('user'=>$array, 'page'=>$page_arr));
    }

    function delete(){
        $this->load->view('T_B_delete');
    }

    function modify(){
        $this->load->view('T_B_modify');
    }

    function main(){
        $this->load->view('T_B_main');
    }

    function register(){
        $this->load->view('T_B_register');
    }
    
    function delete_into(){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $pswd = isset($_GET['pswd']) ? $_GET['pswd'] : "";
        
        $array = $this->Test_Board_M->modify($_GET['id']);

        //return 값이 없으면 delete페이지로
        if($array == null){
            $array = null;
            echo "<script>alert('등록되지 않은 ID 입니다.')</script>";
            $this->delete();
        } // return 값이 있고 패스워드가 같으면 삭제
        else if($array[0]->password == $pswd){
            $this->Test_Board_M->delete($id);
            echo "<script>alert('삭제되었습니다.')</script>";
            $this->main();
        }else{ // 패스워드가 다르면 delete페이지로
            echo "<script>alert('암호가 일치하지 않습니다.')</script>";
            $this->delete();
        }
    }

    //유저 등록 및 수정
    function register_into(){
        $user = array();
        $user[0] = isset($_GET['userid'])? $_GET['userid'] : false;
        $user[1] = isset($_GET['userpassword'])? $_GET['userpassword'] : false;
        $user[2] = isset($_GET['username'])? $_GET['username'] : false;
        $user[3] = isset($_GET['classification'])? $_GET['classification'] : false;
        $user[4] = isset($_GET['gender'])? $_GET['gender'] : false;
        $user[5] = isset($_GET['phone'])? $_GET['phone'] : false;
        $user[6] = isset($_GET['email'])? $_GET['email'] : false;
        $count = true;


        //누락 정보 확인
        for($i = 0; $i < sizeof($user); $i++){
            if(!$user[$i]){
                $count = false;
            }
        }

        //수정 판별 modify가 있으면 업데이트로
        if(isset($_GET['modify']) ? $_GET['modify'] : 0){
            $this->modify2($user, $count);
        }else{  //modify가 없으면 유저 등록으로
            $this->register_into2($user, $count);
        }
    }

    //수정하기
    function modify2($user, $count){
        //누락 정보가 있었으면 페일
        if($count == false){
            echo "false";
        }else{
            $this->Test_Board_M->modify2(isset($_GET['searchid'])? $_GET['searchid'] : null,
                $user[0], $user[3], $user[2], $user[4], $user[1], $user[5], $user[6]);
        }
    }

    //수정할 아이디를 확인 및 정보 가졍괴
    function modify_search(){
        $array['user'] = $this->Test_Board_M->modify($_GET['searchid']);

        if($array == null){
            $array = null;
            echo "<script>alert('ID를 찾을 수 없습니다.')</script>";
            $this->load->view('T_B_modify');
        }else{  //아이디가 있으면 그 사람 정보 를 뷰에 같이 보냄
            $this->load->view('T_B_modify', $array);
        }
    }

    //유저 등록
    function register_into2($user, $count){
        //누락 정보가 없으면 유저 등록
        if($count){
            $this->Test_Board_M->registerationProcess($user[0], $user[3], $user[2], $user[4], $user[1], $user[5], $user[6]);
        }else{  //누락 정보가 있으면 위치 확인
            echo "다음의 항목0이 빠져 있습니다.<br>";
            for($i = 0; $i < sizeof($user); $i++){
                if(!$user[$i] && $i == 0){
                    echo "userid ";
                }else if(!$user[$i] && $i == 1){
                    echo "userpassword ";
                }else if(!$user[$i] && $i == 2){
                    echo "username ";
                }else if(!$user[$i] && $i == 5){
                    echo "phone ";
                }else if(!$user[$i] && $i == 6){
                    echo "email";
                }
            }
        }
    }
}