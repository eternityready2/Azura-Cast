<?php

/** @noinspection PhpMissingFieldTypeInspection */

namespace App\Entity;

use App\Entity\Repository\StationMediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity, ORM\Table(name: 'song_history')]
#[ORM\Index(columns: ['timestamp_start'], name: 'idx_timestamp_start')]
#[ORM\Index(columns: ['timestamp_end'], name: 'idx_timestamp_end')]
class SongHistory implements SongInterface
{
    use Traits\TruncateInts;
    use Traits\HasSongFields;

    /** @var int The expected delay between when a song history record is registered and when listeners hear it. */
    public const PLAYBACK_DELAY_SECONDS = 5;

    /** @var int */
    public const DEFAULT_DAYS_TO_KEEP = 60;

    #[ORM\Column(nullable: false)]
    #[ORM\Id, ORM\GeneratedValue(strategy: 'IDENTITY')]
    protected ?int $id;

    #[ORM\Column]
    protected int $station_id;

    #[ORM\ManyToOne(inversedBy: 'history')]
    #[ORM\JoinColumn(name: 'station_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    protected Station $station;

    #[ORM\Column]
    protected ?int $playlist_id;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'playlist_id', referencedColumnName: 'id',)]
    protected ?StationPlaylist $playlist;

    #[ORM\Column]
    protected ?int $streamer_id;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'streamer_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    protected ?StationStreamer $streamer;

    #[ORM\Column]
    protected ?int $media_id;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'media_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    protected ?StationMediaRepository $media;

    #[ORM\Column]
    protected ?int $request_id;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'request_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    protected ?StationRequest $request;

    #[ORM\Column]
    protected int $timestamp_start;

    #[ORM\Column]
    protected ?int $duration;

    #[ORM\Column]
    protected ?int $listeners_start;

    #[ORM\Column]
    protected int $timestamp_end;

    #[ORM\Column]
    protected ?int $listeners_end;

    #[ORM\Column]
    protected ?int $unique_listeners;

    #[ORM\Column]
    protected int $delta_total;

    #[ORM\Column]
    protected int $delta_positive;

    #[ORM\Column]
    protected int $delta_negative;

    #[ORM\Column(type: 'json', nullable: true)]
    protected mixed $delta_points;

    public function __construct(
        Station $station,
        SongInterface $song
    ) {
        $this->setSong($song);

        $this->station = $station;

        $this->timestamp_start = 0;
        $this->listeners_start = 0;

        $this->timestamp_end = 0;
        $this->listeners_end = 0;

        $this->unique_listeners = 0;

        $this->delta_total = 0;
        $this->delta_negative = 0;
        $this->delta_positive = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStation(): Station
    {
        return $this->station;
    }

    public function getPlaylist(): ?StationPlaylist
    {
        return $this->playlist;
    }

    public function setPlaylist(StationPlaylist $playlist = null): void
    {
        $this->playlist = $playlist;
    }

    public function getStreamer(): ?StationStreamer
    {
        return $this->streamer;
    }

    public function setStreamer(?StationStreamer $streamer): void
    {
        $this->streamer = $streamer;
    }

    public function getMedia(): ?StationMedia
    {
        return $this->media;
    }

    public function setMedia(StationMedia $media = null): void
    {
        $this->media = $media;

        if ($media instanceof StationMedia) {
            $this->setDuration($media->getCalculatedLength());
        }
    }

    public function getRequest(): ?StationRequest
    {
        return $this->request;
    }

    public function setRequest($request): void
    {
        $this->request = $request;
    }

    public function getTimestampStart(): int
    {
        return $this->timestamp_start;
    }

    public function setTimestampStart(int $timestamp_start): void
    {
        $this->timestamp_start = $timestamp_start;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration($duration): void
    {
        $this->duration = $duration;
    }

    public function getListenersStart(): ?int
    {
        return $this->listeners_start;
    }

    public function setListenersStart($listeners_start): void
    {
        $this->listeners_start = $listeners_start;
    }

    public function getTimestampEnd(): int
    {
        return $this->timestamp_end;
    }

    public function setTimestampEnd(int $timestamp_end): void
    {
        $this->timestamp_end = $timestamp_end;

        if (!$this->duration) {
            $this->duration = $timestamp_end - $this->timestamp_start;
        }
    }

    public function getTimestamp(): int
    {
        return (int)$this->timestamp_start;
    }

    public function getListenersEnd(): ?int
    {
        return $this->listeners_end;
    }

    public function setListenersEnd($listeners_end): void
    {
        $this->listeners_end = $listeners_end;
    }

    public function getUniqueListeners(): ?int
    {
        return $this->unique_listeners;
    }

    public function setUniqueListeners($unique_listeners): void
    {
        $this->unique_listeners = $unique_listeners;
    }

    public function getListeners(): int
    {
        return (int)$this->listeners_start;
    }

    public function getDeltaTotal(): int
    {
        return $this->delta_total;
    }

    public function setDeltaTotal(int $delta_total): void
    {
        $this->delta_total = $this->truncateSmallInt($delta_total);
    }

    public function getDeltaPositive(): int
    {
        return $this->delta_positive;
    }

    public function setDeltaPositive(int $delta_positive): void
    {
        $this->delta_positive = $this->truncateSmallInt($delta_positive);
    }

    public function getDeltaNegative(): int
    {
        return $this->delta_negative;
    }

    public function setDeltaNegative(int $delta_negative): void
    {
        $this->delta_negative = $this->truncateSmallInt($delta_negative);
    }

    /**
     */
    public function getDeltaPoints(): mixed
    {
        return $this->delta_points;
    }

    public function addDeltaPoint($delta_point): void
    {
        $delta_points = (array)$this->delta_points;
        $delta_points[] = $delta_point;
        $this->delta_points = $delta_points;
    }

    /**
     * @return bool Whether the record should be shown in APIs (i.e. is not a jingle)
     */
    public function showInApis(): bool
    {
        if ($this->playlist instanceof StationPlaylist) {
            return !$this->playlist->isJingle();
        }
        return true;
    }

    public function __toString(): string
    {
        if ($this->media instanceof StationMedia) {
            return (string)$this->media;
        }

        return (string)(new Song($this));
    }

    public static function fromQueue(StationQueue $queue): self
    {
        $sh = new self($queue->getStation(), $queue);
        $sh->setMedia($queue->getMedia());
        $sh->setRequest($queue->getRequest());
        $sh->setPlaylist($queue->getPlaylist());
        $sh->setDuration($queue->getDuration());

        return $sh;
    }
}
