<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Prints to be handed out
 *
 * This is a seperate class with a OneToOne relationship with Print so we can load it separately
 * @ORM\Entity()
 * @ORM\Table(
 *     name="print",
 *     options={"collate"="utf8mb4_unicode_ci", "charset"="utf8mb4"}
 *     )
 */
class PrintWithSourceCode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", name="printid", options={"comment"="Unique ID"}, nullable=false)
     */
    private int $printid;

    /**
     * @ORM\Column(type="decimal", precision=32, scale=9, name="time", options={"comment"="Timestamp of the print request",
     *                             "unsigned"=true}, nullable=false)
     * @Serializer\Exclude()
     */
    private float $time;

    /**
     * @ORM\Column(type="integer", name="userid", options={"comment"="User ID associated to this entry"}, nullable=false)
     * @Serializer\SerializedName("user_id")
     * @Serializer\Type("string")
     */
    private int $userid;

    /**
     * @ORM\Column(type="boolean", name="done", options={"comment"="Has been handed out yet?"}, nullable=false)
     */
    private bool $done = false;

    /**
     * @ORM\Column(type="text", name="sourcecode", options={"comment"="Full source code"}, nullable=false)
     */
    private string $sourcecode;

    /**
     * @ORM\Column(type="boolean", name="processed", options={"comment"="Has been printed?"}, nullable=false)
     */
    private bool $processed = false;

    /**
     * @ORM\Column(type="string", name="filename", length=255, options={"comment"="Filename as submitted"}, nullable=false)
     */
    private string $filename;

    /**
     * @ORM\Column(type="string", name="langid", options={"comment"="Language ID"}, nullable=true)
     * @Serializer\Exclude()
     */
    private string $langid;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="prints")
     * @ORM\JoinColumn(name="userid", referencedColumnName="userid", onDelete="CASCADE")
     * @Serializer\Exclude()
     */
    private User $user;


    public function getPrintid(): int
    {
        return $this->printid;
    }

    public function setTime(float $time): PrintWithSourceCode
    {
        $this->time = $time;
        return $this;
    }

    public function getTime(): float
    {
        return $this->time;
    }

    public function setUserid(int $userid): PrintWithSourceCode
    {
        $this->userid = $userid;
        return $this;
    }

    public function getUserid(): int
    {
        return $this->userid;
    }

    public function setUser(User $user): PrintWithSourceCode
    {
        $this->user = $user;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setDone(bool $done): PrintWithSourceCode
    {
        $this->done = $done;
        return $this;
    }

    public function getDone(): bool
    {
        return $this->done;
    }

    public function setProcessed(bool $processed): PrintWithSourceCode
    {
        $this->processed = $processed;
        return $this;
    }

    public function getProcessed(): bool
    {
        return $this->processed;
    }

    public function setFilename(string $filename): PrintWithSourceCode
    {
        $this->filename = $filename;
        return $this;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function setSourcecode(string $sourcecode): PrintWithSourceCode
    {
        $this->sourcecode = $sourcecode;

        return $this;
    }

    public function getSourcecode(): string
    {
        return $this->sourcecode;
    }

    public function setLangid(string $langid): PrintWithSourceCode
    {
        $this->langid = $langid;
        return $this;
    }

    public function getLangid(): string
    {
        return $this->langid;
    }
}
