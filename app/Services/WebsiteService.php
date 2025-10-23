<?php

namespace App\Services;

use App\Models\Admin\WebsiteModel;

class WebsiteService
{
    /**
     * Create a new website.
     *
     * @param array $data
     * @return WebsiteModel
     */
    public function create(array $data)
    {
        if ($this->isUrlExists($data['url'])) {
            return false;
        }

        return WebsiteModel::create([
            'nama_web' => $data['name'],
            'url' => $data['url'],
        ]);
    }

    /**
     * Check if a website URL already exists.
     *
     * @param string $url
     * @return bool
     */
    protected function isUrlExists(string $url): bool
    {
        return WebsiteModel::where('url', $url)->exists();
    }

    /**
     * Update an existing website.
     *
     * @param WebsiteModel $website
     * @param array $data
     * @return WebsiteModel
     */
    public function update(WebsiteModel $website, array $data)
    {
        $website->nama_web = $data['name'];
        $website->url = $data['url'];
        $website->save();

        return $website;
    }

    /**
     * Get paginated website list.
     *
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = 15)
    {
        return WebsiteModel::paginate($perPage);
    }

    /**
     * Delete a website by its model instance.
     *
     * @param WebsiteModel $website
     * @return bool|null
     * @throws \Exception
     */
    public function delete($id)
    {
        return WebsiteModel::destroy($id);
    }
}