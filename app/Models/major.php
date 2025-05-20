<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class major extends Model
{
    use HasFactory;

    protected $fillable = [
        'major_name',
        'university_id'
    ];
    public function university()
    {
        return $this->belongsTo(University::class);
    }

    // ✅ Static list of majors for university_id = 1
    protected static $sampleMajors_rupp = [
        'Department of Biology',
        'Department of Chemistry',
        'Department of Computer Science',
        'Department of Environmental Science',
        'Department of Mathematics',
        'Department of Physic',
        'Department of Geography',
        'Department of History',
        'Department of Khmer Literature',
        'Department of Media and Communication',
        'Department of Philosophy',
        'Department of Psychology',
        'Department of Sociology',
        'Department of Social Work',
        'Department of Tourism',
        'Department of Information Technology Engineering',
        'Department of Telecommunication and Electronic Engineering',
        'Department of Bioengineering',
        'Department of Automation and Supply Chain Systems Engineering',
        'Department of Environmental Engineering',
        'Department of Community Development',
        'Department of Economic Development',
        'Department of Natural Resources Management and Development',
        'Department of Educational Studies',
        'Department of Higher Education Development and Management',
        'Department of Lifelong Learning',
        'Department of Chinese',
        'Department of English',
        'Department of French',
        'Department of Japanese',
        'Department of Korean',
        'Department of Thai',
        'Department of International Relations',
        'Department of International Economics',
        'Department of Political Science and Public Policy',
        'Department of Vietnamese Studies',
    ];

    public static function getSampleMajorsRupp()
    {
        return self::$sampleMajors_rupp;
    }


    // Add this below the $sampleMajors array

    protected static $sampleMajors_ITC = [
        'Department of Electrical and Energy Engineering',
        'Department of Industrial and Energy Engineering',
        'Department of Information and Communications Technology (ICT)',
        'Department of Telecommunications and Network Engineering',
        'Department of E-learning',
        'Department of Applied Mathematics and Statistics',
        'Department of Civil Engineering',
        'Department of Architecture Engineering',
        'Department of Infrastructure and Transportation',
        'Department of Resources and Rural Infrastructure',
        'Department of Water Environmental Engineering',
        'Department of Geotechnical Engineering',
        'Department of Geo-resources and Petroleum',
        'Department of Chemical Engineering',
        'Department of Food Science and Technology'
    ];

    public static function getSampleMajorsITC()
    {
        return self::$sampleMajors_ITC;
    }


        protected static $sampleMajors_RULE = [
        'Bachelor of Law',
        'Bachelor of Public Administration',
        'Bachelor of International Relations',
        'Bachelor of Banking and Finance',
        'Bachelor of Accounting',
        'Bachelor of Development Economics',
        'Bachelor of Bussiness Management',
        'Bachelor of Tourism and Hospitality Management',
        'Bachelor of Informatics Economics',
        'Bachelor of Information Technology'
    ];

    public static function getSampleMajorsRULE()
    {
        return self::$sampleMajors_RULE;
    }

    protected static $sampleMajors_AEU = [
        'Department of Computer Network Technology',
        'Department of Electronic and Electricity Engineering',
        'Department of Information Technology',
        'Department of Public Law',
        'Department of Public Administration',
        'Department Community Development',
        'Department of Finance and Banking',
        'Bachelor of Information Technology',
        'Department of Economics',
        'Department of International Business',
        'Department of English Language',
        'Department of Chinese Literature',
        'Department of International Relations',
        'Department of Other Activities',
        'Department of Management',
        'Department of Marketing',
        'Department of Accounting',
        'Department Human Resource Management',
        'Department of Hotel and Tourism Management',
        'Department of Information Management Systems'

    ];
    public static function getSampleMajorsAEU()
    {
        return self::$sampleMajors_AEU;
    }

    protected static $sampleMajors_CADT = [
        'Computer Science (B, M)',
        'Data Science',
        'Digital Media',
        'Cybersecurity',
        'Digital Governance Training',
        'Technology Transformation for Government Agencies',
        'Internet of Things (loT)',
        'Digital Policy Research'
       
    ];
    public static function getSampleMajorsCADT()
    {
        return self::$sampleMajors_CADT;
    }


}

  