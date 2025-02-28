<?php

namespace TestMonitor\Jira\Resources;

use TestMonitor\Jira\Validator;

class Project extends Resource
{
    /**
     * The id of the project.
     *
     * @var string
     */
    public $id;

    /**
     * The key of the project.
     *
     * @var string
     */
    public $key;

    /**
     * The name of the project.
     *
     * @var string
     */
    public $name;

    /**
     * The issue types of the project.
     *
     * @var array
     */
    public $issueTypes;

    /**
     * Create a new resource instance.
     *
     * @param array $project
     */
    public function __construct(array $project)
    {
        Validator::keysExists($project, ['id', 'key', 'name', 'issueTypes']);

        $this->id = $project['id'];
        $this->key = $project['key'];
        $this->name = $project['name'];

        $this->issueTypes = $project['issueTypes'];
    }
}
