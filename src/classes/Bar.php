<?php
namespace Honest;

class Bar
{
    /**
     * @var Db
     */
    private $db;

    public function __construct()
    {
        $this->db = Db::instance();
    }

    public function payForDrink(int $person)
    {
        $this->db->run('INSERT into consumption (`person`, `created_at`) VALUES (?, now())', [$person]);
    }

    public function getOverallLeaderboard()
    {
        $leaders = $this->db->run(
            'SELECT consumption.person, people.barcode, people.first_name, people.last_name, COUNT(consumption.person) AS drinks 
                FROM consumption 
                LEFT JOIN people ON consumption.person = people.id
                GROUP BY consumption.person 
                ORDER BY drinks DESC;'
        )->fetchAll();
        $people = [];
        foreach ($leaders as $leader) {
            $person = new Person($leader->barcode);
            $person->setDrinks($leader->drinks);
            $people[] = $person;
        }
        return $people;
    }

    public function getMaleLeaderboard()
    {
        $leaders = $this->db->run(
            "SELECT consumption.person, people.barcode, people.first_name, people.last_name, people.gender, COUNT(consumption.person) AS drinks 
                FROM consumption 
                LEFT JOIN people ON consumption.person = people.id
                WHERE people.gender = 'm'
                GROUP BY consumption.person 
                ORDER BY drinks DESC;"
        )->fetchAll();
        $people = [];
        foreach ($leaders as $leader) {
            $person = new Person($leader->barcode);
            $person->setDrinks($leader->drinks);
            $people[] = $person;
        }
        return $people;
    }

    public function getFemaleLeaderboard()
    {
        $leaders = $this->db->run(
            "SELECT consumption.person, people.barcode, people.first_name, people.last_name, people.gender, COUNT(consumption.person) AS drinks 
                FROM consumption 
                LEFT JOIN people ON consumption.person = people.id
                WHERE people.gender = 'f'
                GROUP BY consumption.person 
                ORDER BY drinks DESC;"
        )->fetchAll();
        $people = [];
        foreach ($leaders as $leader) {
            $person = new Person($leader->barcode);
            $person->setDrinks($leader->drinks);
            $people[] = $person;
        }
        return $people;
    }

    public function getHistory()
    {
        return $this->db->run('SELECT consumption.person, consumption.created_at, people.first_name, people.last_name
                FROM consumption 
                LEFT JOIN people ON consumption.person = people.id
                ORDER BY consumption.created_at DESC;')->fetchAll();
    }

    public function getLeaderboardPosition(int $id)
    {
        foreach ($this->getOverallLeaderboard() as $position => $leaders) {
            if ($leaders->getId() === $id) {
                return $position + 1;
            }
        }
    }

    public function getFirstThree(array $board)
    {
        return array_slice($board, 0, 3);
    }

    public function getRemaining(array $board)
    {
        return array_slice($board, 3);
    }
}
