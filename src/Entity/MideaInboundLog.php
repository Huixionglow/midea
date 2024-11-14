<?php

namespace App\Entity;

use App\Repository\MideaInboundLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MideaInboundLogRepository::class)]
class MideaInboundLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT,name: 'request_data')]
    private ?string $requestData = null;
    
    #[ORM\Column(type: Types::TEXT)]
    private ?string $header = null;

    #[ORM\Column(length: 255)]
    private ?string $route = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, name: 'request_time')]
    private ?\DateTimeInterface $requestTime = null;

    #[ORM\Column(type: Types::TEXT, name: 'response_data')]
    private ?string $responseData = null;

    #[ORM\Column(length: 255, name: 'user_agent')]
    private ?string $userAgent = null;

    #[ORM\Column(type: Types::TEXT, nullable: true, name: 'sent_data')]
    private ?string $sentData = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, name: 'created_at')]
    private ?\DateTimeInterface $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRequestData(): ?string
    {
        return $this->requestData;
    }

    public function setRequestData(string $requestData): static
    {
        $this->requestData = $requestData;

        return $this;
    }

    public function getHeader(): ?string
    {
        return $this->header;
    }

    public function setHeader(string $header): static
    {
        $this->header = $header;

        return $this;
    }

    public function getRoute(): ?string
    {
        return $this->route;
    }

    public function setRoute(string $route): static
    {
        $this->route = $route;

        return $this;
    }

    public function getRequestTime(): ?\DateTimeInterface
    {
        return $this->requestTime;
    }

    public function setRequestTime(string $requestTime): static
    {
        $requestTime = new \DateTime($requestTime);
        $this->requestTime = $requestTime;

        return $this;
    }

    public function getResponseData(): ?string
    {
        return $this->responseData;
    }

    public function setResponseData(string $responseData): static
    {
        $this->responseData = $responseData;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(string $userAgent): static
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    public function getSentData(): ?string
    {
        return $this->sentData;
    }

    public function setSentData(?string $sentData): static
    {
        $this->sentData = $sentData;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
