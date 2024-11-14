<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Speciality;

class SpeciallitySeeder extends Seeder
{
    public function run(): void
    {
        $specialties = [
            ['speciality_name' => 'Allergy and Immunology', 'speciality_image' => 'allergy_immunology.png'],
            ['speciality_name' => 'Anesthesiology', 'speciality_image' => 'anesthesiology.png'],
            ['speciality_name' => 'Cardiology', 'speciality_image' => 'cardiology.png'],
            ['speciality_name' => 'Critical Care Medicine', 'speciality_image' => 'critical_care_medicine.png'],
            ['speciality_name' => 'Dermatology', 'speciality_image' => 'dermatology.png'],
            ['speciality_name' => 'Emergency Medicine', 'speciality_image' => 'emergency_medicine.png'],
            ['speciality_name' => 'Endocrinology', 'speciality_image' => 'endocrinology.png'],
            ['speciality_name' => 'Family Medicine', 'speciality_image' => 'family_medicine.png'],
            ['speciality_name' => 'Gastroenterology', 'speciality_image' => 'gastroenterology.png'],
            ['speciality_name' => 'General Surgery', 'speciality_image' => 'general_surgery.png'],
            ['speciality_name' => 'Geriatrics', 'speciality_image' => 'geriatrics.png'],
            ['speciality_name' => 'Hematology', 'speciality_image' => 'hematology.png'],
            ['speciality_name' => 'Infectious Disease', 'speciality_image' => 'infectious_disease.png'],
            ['speciality_name' => 'Internal Medicine', 'speciality_image' => 'internal_medicine.png'],
            ['speciality_name' => 'Nephrology', 'speciality_image' => 'nephrology.png'],
            ['speciality_name' => 'Neurology', 'speciality_image' => 'neurology.png'],
            ['speciality_name' => 'Neurosurgery', 'speciality_image' => 'neurosurgery.png'],
            ['speciality_name' => 'Nuclear Medicine', 'speciality_image' => 'nuclear_medicine.png'],
            ['speciality_name' => 'Obstetrics & Gynecology', 'speciality_image' => 'obstetrics_gynecology.png'],
            ['speciality_name' => 'Oncology', 'speciality_image' => 'oncology.png'],
            ['speciality_name' => 'Ophthalmology', 'speciality_image' => 'ophthalmology.png'],
            ['speciality_name' => 'Orthopedic Surgery', 'speciality_image' => 'orthopedic_surgery.png'],
            ['speciality_name' => 'Otolaryngology (ENT)', 'speciality_image' => 'otolaryngology.png'],
            ['speciality_name' => 'Palliative Care', 'speciality_image' => 'palliative_care.png'],
            ['speciality_name' => 'Pathology', 'speciality_image' => 'pathology.png'],
            ['speciality_name' => 'Pediatrics', 'speciality_image' => 'pediatrics.png'],
            ['speciality_name' => 'Physical Medicine & Rehabilitation', 'speciality_image' => 'physical_medicine.png'],
            ['speciality_name' => 'Plastic Surgery', 'speciality_image' => 'plastic_surgery.png'],
            ['speciality_name' => 'Preventive Medicine', 'speciality_image' => 'preventive_medicine.png'],
            ['speciality_name' => 'Psychiatry', 'speciality_image' => 'psychiatry.png'],
            ['speciality_name' => 'Pulmonology', 'speciality_image' => 'pulmonology.png'],
            ['speciality_name' => 'Radiology', 'speciality_image' => 'radiology.png'],
            ['speciality_name' => 'Rheumatology', 'speciality_image' => 'rheumatology.png'],
            ['speciality_name' => 'Sleep Medicine', 'speciality_image' => 'sleep_medicine.png'],
            ['speciality_name' => 'Sports Medicine', 'speciality_image' => 'sports_medicine.png'],
            ['speciality_name' => 'Thoracic Surgery', 'speciality_image' => 'thoracic_surgery.png'],
            ['speciality_name' => 'Urology', 'speciality_image' => 'urology.png'],
            ['speciality_name' => 'Vascular Surgery', 'speciality_image' => 'vascular_surgery.png'],
        ];

      
        foreach ($specialties as $specialty) {
            Speciality::create($specialty);
        }
    }
}
