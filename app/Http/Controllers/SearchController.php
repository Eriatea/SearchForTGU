<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DateTime;

class SearchController extends Controller
{
  public function index()
  {
     return view('search');
           
  }

   public function Search(Request $request)
   {  
    $startDate=$request->startDate;
    $endDate=$request->endDate;
    $lastName=$request->lastName;
    $firstName=$request->firstName;
    $middleName=$request->middleName;
    $startDate=date( "d.m.Y H:i", strtotime( $startDate ) );
    $endDate=date( "d.m.Y H:i", strtotime( $endDate ) );

        try {
           $dsn = 'firebird:dbname=C:\Users\maxit\Downloads\APACS_3000_Demo\DB\Firebird_db\ApacsDemoRus.FDB;http://localhost:4000;charset=WIN1251;';
           $username = 'SYSDBA';
           $password = 'masterkey';
           $dbh= new \PDO($dsn, $username, $password, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);

           $sql="SELECT FREALTIME, FINITOBJNAME, FHOLDERNAME, FFIRSTNAME, FLASTNAME, FMIDDLENAME  FROM TAPCSYSEVENTSCOMMON 
           INNER JOIN tapccardholderref ON (tapcsyseventscommon.fsek1 = tapccardholderref.fsek1)
           INNER JOIN tapccardholder ON (tapccardholderref.fsaholder1 = tapccardholder.fid1)
           WHERE FREALTIME >= '" . $startDate . "' and FREALTIME <= '" . $endDate ."' ";

           if ($lastName) {
            $sql = $sql  . " AND  FLASTNAME = '" . $lastName . "'";
           } 

           if ($firstName) {
            $sql = $sql  . " AND  FFIRSTNAME= '" . $firstName . "'";
           }

           if ($middleName) {
            $sql = $sql  . " AND  FMIDDLENAME = '" . $middleName . "'";
           } 
          $query = $dbh->query($sql);
         
 
            // Получаем результат построчно в виде объекта
           while ($row = $query->fetch(\PDO::FETCH_OBJ)) 
            { echo'<pre>';
              echo $row->FREALTIME, "\n";
              echo $row->FINITOBJNAME, "\n";
              echo $row->FFIRSTNAME, "\n";
              echo $row->FLASTNAME, "\n";
              echo $row->FMIDDLENAME, "\n";
              echo '</pre>';
           
              // return view('search',compact('query'),compact('row'));
            }
         
              
              $query->closeCursor(); // Закрываем курсор
            } 
            
            //  режим обработки ошибок
    catch (\PDOException $e) {
     echo $e->getMessage();
    
       }
   
  
   }
 
}
   


