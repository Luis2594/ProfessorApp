<?php

include_once '../data/CircularData.php';

/**
 * Description of CircularBusiness
 *
 * @author Kevin Esquivel Marín <kevinesquivel21@gmail.com>
 */
class CircularBusiness
{
    private $circularData;

    public function CircularBusiness()
    {
        return $this->circularData = new CircularData();
    }

    /**
     * Guarda un registro.
     */
    public function insert($circular)
    {
        return $this->circularData->insert($circular);
    }

    /**
     * Actualiza la descripción.
     */
    public function update($id, $text)
    {
        return $this->circularData->update($id, $text);
    }

    /**
     * Obtiene de base de datos por id.
     */
    public function get($id)
    {
        return $this->circularData->get($id);
    }

    /**
     * Obtiene de base de datos por id de quien envía.
     */
    public function getBySender($id)
    {
        return $this->circularData->getBySender($id);
    }

    /**
     * Obtiene de base de datos todos los registros.
     */
    public function getAll()
    {
        return $this->circularData->getAll();
    }

    /**
     * Elimina tupla de tabla
     */
    public function delete($id)
    {
        return $this->circularData->delete($id);
    }

    /**
     * Captura los registros de los últimos 7 días.
     */
    public function getLatest()
    {
        return $this->circularData->getLatest();
    }
}
