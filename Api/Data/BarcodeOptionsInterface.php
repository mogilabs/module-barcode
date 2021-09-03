<?php
declare(strict_types=1);

namespace Jayreis\Barcode\Api\Data;

interface BarcodeOptionsInterface
{
    /**
     * String constants for property names
     */
    const F = "f";
    const S = "s";
    const D = "d";

    /**
     * Getter for F.
     *
     * @return string|null
     */
    public function getF(): ?string;

    /**
     * Setter for F.
     *
     * @param string|null $f
     *
     * @return void
     */
    public function setF(?string $f): void;

    /**
     * Getter for S.
     *
     * @return string|null
     */
    public function getS(): ?string;

    /**
     * Setter for S.
     *
     * @param string|null $s
     *
     * @return void
     */
    public function setS(?string $s): void;

    /**
     * Getter for D.
     *
     * @return string|null
     */
    public function getD(): ?string;

    /**
     * Setter for D.
     *
     * @param string|null $d
     *
     * @return void
     */
    public function setD(?string $d): void;
}
