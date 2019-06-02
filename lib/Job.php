<?php 
    class Job{

        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        // Get all jobs

        public function getAllJobs(){
            $this->db->querry("SELECT jobs.*, categories.name AS cname 
            FROM jobs
            INNER JOIN categories
            ON jobs.category_id = categories.id
            ORDER BY post_date DESC
            ");

            //Assign the results SET
            $results = $this->db->resultsSet();

            return $results;
        }


        // Get categories
        public function getCategories(){
            $this->db->querry("SELECT * From categories");

            //Assign the results SET
            $results = $this->db->resultsSet();

            return $results;
        }

        // Get by category
        public function getByCategory($category){
            $this->db->querry("SELECT jobs.*, categories.name AS cname 
            FROM jobs
            INNER JOIN categories
            ON jobs.category_id = categories.id
            WHERE jobs.category_id = $category
            ORDER BY post_date DESC
            ");

            //Assign the results SET
            $results = $this->db->resultsSet();

            return $results;
        }

        //Get Category 
        public function getCategory($category_id){
            $this->db->querry('SELECT *  FROM categories WHERE id =
             :category_id');

             $this->db->bind(':category_id', $category_id);

             // Assign the row
             $row = $this->db->single();

             return $row;
        }

        // Get JOB

        public function getJob($id){
            $this->db->querry('SELECT *  FROM jobs WHERE id =
            :id');

            $this->db->bind(':id', $id);

            // Assign the row
            $row = $this->db->single();

            return $row;
        }
    }