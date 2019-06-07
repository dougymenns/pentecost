<?php

namespace App\Imports;

use App\Member;
use Maatwebsite\Excel\Concerns\ToModel;

class MembersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Member([
			'Member_Id' => $row[0],
			'Member_Type' => $row[1],
			'First_Name' => $row[2],
			'Last_Name' => $row[3],
			'Marital_Status' => $row[4],
			'Title' => $row[5],
			'Gender' => $row[6],
			'Email' => $row[7],
			'Phone' => $row[8],
			'Nationality' => $row[9],
			'Date_of_Birth' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10]),
			'Date_Joined' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[11]),
			'Secondary_Phone' => $row[12],
			'Emergency_Contact_Person' => $row[13],
			'Phone_of_Emergency_Contact' => $row[14],
			'Postal_Address' => $row[15],
			'Hometown' => $row[16],
			'Residential_Address' => $row[17],
			'Membership_Status' => $row[18],
			'Member_Active_Group' => $row[19],
			'Membership_Position' => $row[20],
			'Year_Joined' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[21]),
			'Special_Gift' => $row[22],
			'Previous_Church' => $row[23],
			'Position_Held_in_Previous_Church' => $row[24],
			'New_Birth_Baptism' => $row[25],
			'Water_Baptism' => $row[26],
			'Holy_Spirit_Baptism' => $row[27],
			'Family_Relation' => $row[28],
			'Relation_Name' => $row[29],
			'Relation_Phone_Number' => $row[30],
			'Relation_Email' => $row[31],
			'Next_of_Kin' => $row[32],
			'Next_of_Kin_Contact' => $row[33],
			'Member_Occupation_Industry' => $row[34],
			'Member_Specific_Job' => $row[35],
			'Institution_of_Employment' => $row[36],
			'Date_of_Employment_From' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[37]),
			'Date_of_Employment_To' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[38]),
			'Educational_Level' => $row[39],
			'Educational_Institution' => $row[40],
			'Certification' => $row[41],
			'Certification_Date_From' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[42]),
			'Certification_Date_To' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[43]),
            'Signed_By' => $row[44],
			
        ]);
    }
}
