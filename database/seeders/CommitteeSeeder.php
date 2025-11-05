<?php

namespace Database\Seeders;

use App\Models\Committee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $committee = Committee::firstOrCreate([
            'name' => 'Prof. Dr. Noel Lopes',
            'role' => '',
            'university' => 'Polytechnic of Guarda',
            'country' => 'Portugal',
            'type' => 'steering',
            'event_id' => 1
        ]);
        $committee = Committee::firstOrCreate([
            'name' => 'Prof. Dr. Shi-Jinn Horng',
            'role' => '',
            'university' => 'National Taiwan University Sains & Technology (NTUST)',
            'country' => 'Taiwan',
            'type' => 'steering',
            'event_id' => 1
        ]);
        $committee = Committee::firstOrCreate([
            'name' => 'Prof. Dr. Riyanarto Sarno',
            'role' => '',
            'university' => 'Institut Teknologi Sepuluh Nopember (ITS)',
            'country' => 'Indonesia',
            'type' => 'steering',
            'event_id' => 1
        ]);
        $committees = [
            ['name' => 'Prof. Dr. Noel Lopes', 'university' => 'Polytechnic of Guarda', 'country' => 'Portugal'],
            ['name' => 'Prof. Dr. Shi-Jinn Horng', 'university' => 'National Taiwan University Sains & Technology (NTUST)', 'country' => 'Taiwan'],
            ['name' => 'Prof. Dr. Riyanarto Sarno', 'university' => 'Institut Teknologi Sepuluh Nopember (ITS)', 'country' => 'Indonesia'],
            ['name' => 'Prof. Pitoyo Hartono', 'university' => 'Chukyo University, Toyota', 'country' => 'Japan'],
            ['name' => 'Prof. Dr. Abderrafiaa Koukam', 'university' => 'Université de Technologie de Belfort-Montbéliard (UTBM)', 'country' => 'France'],
            ['name' => 'Prof. Harold Boley', 'university' => 'Faculty of Computer Science, University of New Brunswick, NB', 'country' => 'Canada'],
            ['name' => 'Assoc. Prof. Dr. Emanuele Menegatti', 'university' => 'Universita Degli Studi di Padova, Padua', 'country' => 'Italy'],
            ['name' => 'Assoc. Prof. Dr. Amelia Ritahani Ismail', 'university' => 'Department of Computer Science, International Islamic University Malaysia', 'country' => 'Malaysia'],
            ['name' => 'Assoc. Prof. Somnuk Phon-Amnuaisuk', 'university' => 'Universiti Teknologi Brunei', 'country' => 'Brunei Darussalam'],
            ['name' => 'Assoc. Prof. Dr. Nishchal K. Verma', 'university' => 'Indian Institute of Technology, Kanpur', 'country' => 'India'],
            ['name' => 'Assoc. Prof. Dr. Rodina Ahmad', 'university' => 'University of Malaya', 'country' => 'Malaysia'],
            ['name' => 'Dr. Arda Yunianta', 'university' => 'Faculty of Computing and Information Technology, King Abdul aziz University', 'country' => 'Saudi Arabia'],
            ['name' => 'Dr. Lala Septem Riza', 'university' => 'Universitas Pendidikan Indonesia', 'country' => 'Indonesia'],
            ['name' => 'Dr. Francisco Javier Rodriguez Diaz', 'university' => 'Universidad de Granada', 'country' => 'Spain'],
            ['name' => 'Dr. Moslem Yousefi', 'university' => 'Korea University', 'country' => 'Korea, Republic of'],
            ['name' => 'Dr. Diana Martín Rodríguez', 'university' => 'Instituto Superior Politecnico Jose Antonio Echeverria', 'country' => 'Cuba'],
            ['name' => 'Dr. Danial Hooshyar', 'university' => 'Korea University', 'country' => 'Korea, Republic of'],
            ['name' => 'Dr. Alejandro Rosales-Pérez', 'university' => 'Tecnologico de Monterrey, School of Science and Engineering, Monterrey', 'country' => 'Mexico'],
            ['name' => 'Dr. Esa Prakasa', 'university' => 'Research Center for Informatics LIPI', 'country' => 'Indonesia'],
            ['name' => 'Dr. Shafaatunnur Hasan', 'university' => 'Universiti Teknologi Malaysia', 'country' => 'Malaysia'],
            ['name' => 'Dr. Ummi Rabaah Hashim', 'university' => 'Universiti Teknikal Malaysia Melaka', 'country' => 'Malaysia'],
            ['name' => 'Dr. Edi Kurniawan', 'university' => 'Research Center for Informatics LIPI', 'country' => 'Indonesia'],
            ['name' => 'Dr. Wayan Firdaus Mahmudy', 'university' => 'Universitas Brawijaya', 'country' => 'Indonesia'],
            ['name' => 'Dr. Abdulrazak Yahya Saleh', 'university' => 'Universiti Malaysia Sarawak', 'country' => 'Malaysia'],
            ['name' => 'Dr.-Ing. Reza Pulungan', 'university' => 'Universitas Gadjah Mada', 'country' => 'Indonesia'],
            ['name' => 'Dr. Bahram Amini', 'university' => 'Universiti Teknologi Malaysia (UTM)', 'country' => 'Malaysia'],
            ['name' => 'Dr. Mohd Shahizan Othman', 'university' => 'Universiti Teknologi Malaysia', 'country' => 'Malaysia'],
            ['name' => 'Iwan Tri Riyadi Yanto', 'university' => 'Universitas Ahmad Dahlan', 'country' => 'Indonesia'],
            ['name' => 'Murinto Murinto', 'university' => 'Universitas Ahmad Dahlan', 'country' => 'Indonesia'],
            ['name' => 'Indra Riyanto', 'university' => 'IEEE Indonesia Section; Universitas Budi Luhur', 'country' => 'Indonesia'],
            ['name' => 'Dr. Sunu Wibirama', 'university' => 'Universitas Gadjah Mada', 'country' => 'Indonesia'],
            ['name' => 'Armin Lawi', 'university' => 'Department of Computer Science, Hasanuddin University', 'country' => 'Indonesia'],
            ['name' => 'Dr. Diaraya', 'university' => 'Department of Computer Science, Hasanuddin University', 'country' => 'Indonesia'],
            ['name' => 'Nurdiansyah Sirimorok', 'university' => 'Kyushu Institute of Technology', 'country' => 'Japan'],
            ['name' => 'Ismail Parewai', 'university' => 'Kyushu Institute of Technology', 'country' => 'Japan'],
            ['name' => 'Mahdillah', 'university' => 'Kyushu Institute of Technology', 'country' => 'Japan'],
            ['name' => 'Ajif Yunizar Pratama Yusuf', 'university' => 'Kyushu Institute of Technology', 'country' => 'Japan'],
            ['name' => 'Genett Jimenez', 'university' => 'Institución Universitaria ITSA', 'country' => 'Colombia'],
        ];

        foreach ($committees as $data) {
            Committee::firstOrCreate([
                'name' => $data['name'],
                'role' => '',
                'university' => $data['university'],
                'country' => $data['country'],
                'type' => 'technical program',
                'event_id' => 1,
            ]);
        }
        $committee = Committee::firstOrCreate([
            'name' => 'Haviluddin',
            'role' => 'General Chair',
            'university' => 'Universtias Mulawarman',
            'country' => 'Indonesia',
            'type' => 'organizing',
            'event_id' => 1
        ]);
        $committee = Committee::firstOrCreate([
            'name' => 'Awang Hendritanto Pratomo',
            'role' => 'General Co-Chair',
            'university' => 'UPN Veteran Yogyakarta',
            'country' => 'Indonesia',
            'type' => 'organizing',
            'event_id' => 1
        ]);
        $committee = Committee::firstOrCreate([
            'name' => 'Purnawansah',
            'role' => 'General Co-Chair',
            'university' => 'Universitas Muslim Indonesia',
            'country' => 'Indonesia',
            'type' => 'organizing',
            'event_id' => 1
        ]);
        $committee = Committee::firstOrCreate([
            'name' => 'Andri Pranolo',
            'role' => 'Publication Chair',
            'university' => 'Universitas Ahmad Dahlan; Hohai University',
            'country' => 'Indonesia; China',
            'type' => 'organizing',
            'event_id' => 1
        ]);
        $committee = Committee::firstOrCreate([
            'name' => 'Lala Septem Riza',
            'role' => 'Publication Chair',
            'university' => 'Universitas Pendidikan Indonesia',
            'country' => 'Indonesia',
            'type' => 'organizing',
            'event_id' => 1
        ]);
        $committee = Committee::firstOrCreate([
            'name' => 'Tinton Dwi Atmaja',
            'role' => 'Publication Chair',
            'university' => 'Research Center for Informatics LIPI',
            'country' => 'Indonesia',
            'type' => 'organizing',
            'event_id' => 1
        ]);
        $committee = Committee::firstOrCreate([
            'name' => 'Aji Prasetya Wibawa',
            'role' => 'Publication Chair',
            'university' => 'Universitas Negeri Malang',
            'country' => 'Indonesia',
            'type' => 'organizing',
            'event_id' => 1
        ]);
        $committees = [
            ['name' => 'Mahdillah', 'university' => 'Kyushu Institute of Technology', 'country' => 'Japan'],
            ['name' => 'Adhi Prahara', 'university' => 'Universitas Ahmad Dahlan', 'country' => 'Indonesia'],
            ['name' => 'Ahmad Azhari', 'university' => 'Universitas Ahmad Dahlan', 'country' => 'Indonesia'],
            ['name' => 'Agus Aktawan', 'university' => 'Universitas Ahmad Dahlan', 'country' => 'Indonesia'],
            ['name' => 'Purnawansah', 'university' => 'Universitas Muslim Indonesia', 'country' => 'Indonesia'],
            ['name' => 'Yulita Salim', 'university' => 'Universitas Muslim Indonesia', 'country' => 'Indonesia'],
            ['name' => 'Halinda Lahuddin', 'university' => 'Universitas Muslim Indonesia', 'country' => 'Indonesia'],
        ];

        foreach ($committees as $data) {
            Committee::firstOrCreate([
                'name' => $data['name'],
                'role' => 'Secretariat',
                'university' => $data['university'],
                'country' => $data['country'],
                'type' => 'organizing',
                'event_id' => 1,
            ]);
        }
    }
}
