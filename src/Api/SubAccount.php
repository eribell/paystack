<?php
/**
 *
 * This file is part of the Xeviant Paystack package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package          Paystack
 * @version          1.0
 * @author           Olatunbosun Egberinde
 * @license          MIT Licence
 * @copyright       (c) Olatunbosun Egberinde <bosunski@gmail.com>
 * @link             https://github.com/bosunski/paystack
 *
 */

namespace Xeviant\Paystack\Api;


class SubAccount extends AbstractApi
{
	const BASE_PATH = '/subaccount';

	public function fetch(string $accountId)
	{
		$this->required->setRequiredParameters(['id_or_slug']);
		if ($this->required->checkParameters(['id_or_slug' => $accountId])) {
			return $this->get(self::BASE_PATH . '/' . $accountId);
		}
	}

	public function list(array $parameters = [])
	{
		return $this->get(self::BASE_PATH, $parameters);
	}

	public function create(array $parameters)
	{
		$this->required->setRequiredParameters(['business_name', 'settlement_bank', 'account_number', 'percentage_charge']);

		if ($this->required->checkParameters($parameters)) {
			return $this->post(self::BASE_PATH, $parameters);
		}
	}

	public function update(string $accountId, array $parameters)
	{
		return $this->put(self::BASE_PATH . "/$accountId", $parameters);
	}
}