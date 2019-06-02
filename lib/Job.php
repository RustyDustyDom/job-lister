<?php
class Job
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get all jobs

    public function getAllJobs()
    {
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
    public function getCategories()
    {
        $this->db->querry("SELECT * From categories");

        //Assign the results SET
        $results = $this->db->resultsSet();

        return $results;
    }

    // Get by category
    public function getByCategory($category)
    {
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
    public function getCategory($category_id)
    {
        $this->db->querry('SELECT *  FROM categories WHERE id =
             :category_id');

        $this->db->bind(':category_id', $category_id);

        // Assign the row
        $row = $this->db->single();

        return $row;
    }

    // Get JOB

    public function getJob($id)
    {
        $this->db->querry('SELECT *  FROM jobs WHERE id =
            :id');

        $this->db->bind(':id', $id);

        // Assign the row
        $row = $this->db->single();

        return $row;
    }

    // Create Job

    public function create($data)
    {
        $this->db->querry("INSERT INTO jobs (category_id, job_title, company,
            description, location, salary, contact_user, contact_email)
            VALUES (:category_id, :job_title, :company,
            :description, :location, :salary, :contact_user, :contact_email)");

        // Bind Data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
