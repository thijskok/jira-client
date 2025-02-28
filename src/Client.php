<?php

namespace TestMonitor\Jira;

use JiraRestApi\Issue\IssueService;
use JiraRestApi\Project\ProjectService;
use JiraRestApi\Configuration\ArrayConfiguration;

class Client
{
    use Actions\ManagesAttachments,
        Actions\ManagesIssues,
        Actions\ManagesProjects;

    /**
     * @var string
     */
    protected $instance;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var ArrayConfiguration
     */
    protected $configuration;

    /**
     * @var IssueService
     */
    protected $issueService;

    /**
     * @var ProjectService
     */
    protected $projectService;

    /**
     * Create a new client instance.
     *
     * @param string $instance
     * @param string $username
     * @param string $token
     */
    public function __construct($instance, $username, $token)
    {
        $this->instance = $instance;
        $this->username = $username;
        $this->token = $token;

        $this->configuration = new ArrayConfiguration([
            'jiraHost' => $this->instance,
            'jiraUser' => $this->username,
            'jiraPassword' => $this->token,
        ]);
    }

    /**
     * @throws \JiraRestApi\JiraException
     *
     * @return \JiraRestApi\Issue\IssueService
     */
    protected function issueService(): IssueService
    {
        return $this->issueService ?? new IssueService($this->configuration);
    }

    /**
     * @param \JiraRestApi\Issue\IssueService|null $service
     */
    public function setIssueService(IssueService $service)
    {
        $this->issueService = $service;
    }

    /**
     * @throws \JiraRestApi\JiraException
     *
     * @return \JiraRestApi\Project\ProjectService
     */
    protected function projectService(): ProjectService
    {
        return $this->projectService ?? new ProjectService($this->configuration);
    }

    /**
     * @param \JiraRestApi\Project\ProjectService $service
     */
    public function setProjectService(ProjectService $service)
    {
        $this->projectService = $service;
    }
}
