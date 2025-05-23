<?php
/**
 * Class CreateShipment
 *
 * @package Packetery\Core\Api\Soap\Response
 */

declare( strict_types=1 );

namespace Packetery\Core\Api\Soap\Response;

/**
 * Class CreateShipment
 *
 * @package Packetery\Core\Api\Soap\Response
 */
class CreateShipment extends BaseResponse {

	/**
	 * Shipment ID.
	 *
	 * @var string
	 */
	private $id;

	/**
	 * Checksum.
	 *
	 * @var string
	 */
	private $checksum;

	/**
	 * Barcode.
	 *
	 * @var string
	 */
	private $barcode;

	/**
	 * Barcode text.
	 *
	 * @var string
	 */
	private $barcodeText;

	/**
	 * Invalid packet IDs.
	 *
	 * @var string[]
	 */
	private $invalidPacketIds = [];

	/**
	 * Gets ID.
	 *
	 * @return string
	 */
	public function getId(): string {
		return $this->id;
	}

	/**
	 * Sets ID.
	 *
	 * @param string $id ID.
	 */
	public function setId( string $id ): void {
		$this->id = $id;
	}

	/**
	 * Gets checksum.
	 *
	 * @return string
	 */
	public function getChecksum(): string {
		return $this->checksum;
	}

	/**
	 * Checksum.
	 *
	 * @param string $checksum Checksum.
	 */
	public function setChecksum( string $checksum ): void {
		$this->checksum = $checksum;
	}

	/**
	 * Barcode.
	 *
	 * @return string
	 */
	public function getBarcode(): string {
		return $this->barcode;
	}

	/**
	 * Sets barcode.
	 *
	 * @param string $barcode Barcode.
	 */
	public function setBarcode( string $barcode ): void {
		$this->barcode = $barcode;
	}

	/**
	 * Barcode text simplified.
	 *
	 * @return string
	 */
	public function getSimpleBarcodeText(): string {
		$exploded = explode( ':', $this->barcodeText );
		$first    = array_shift( $exploded );

		return trim( (string) $first );
	}

	/**
	 * Barcode text.
	 *
	 * @return string
	 */
	public function getBarcodeText(): string {
		return $this->barcodeText;
	}

	/**
	 * Barcode text.
	 *
	 * @param string $barcodeText Barcode text.
	 */
	public function setBarcodeText( string $barcodeText ): void {
		$this->barcodeText = $barcodeText;
	}

	/**
	 * Gets invalid packet IDs.
	 *
	 * @return string[]
	 */
	public function getInvalidPacketIds(): array {
		return $this->invalidPacketIds;
	}

	/**
	 * Sets invalid packet IDs.
	 *
	 * @param string[] $invalidPacketIds Invalid packets.
	 */
	public function setInvalidPacketIds( array $invalidPacketIds ): void {
		$this->invalidPacketIds = $invalidPacketIds;
	}
}
