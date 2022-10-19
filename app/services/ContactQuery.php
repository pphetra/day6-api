<?php

namespace App\Services;

use Illuminate\Http\Request;

class ContactQuery {
  // transform request to query
  public function transform(Request $request) {
    $queryItems = [];
    $queryItems = $this->addQueryItem($queryItems, $request, 'name', 'like');
    $queryItems = $this->addQueryItem($queryItems, $request, 'surname', 'like');
    $queryItems = $this->addQueryItem($queryItems, $request, 'email', 'like');
    $queryItems = $this->addQueryItem($queryItems, $request, 'phone', 'like');    
    return $queryItems;
  }

  private function addQueryItem($queryItems, $request, $column, $operator) {
    $value = $request->input($column);
    if ($value != null) {
      $queryItems[] = [$column, $operator, $value];
    }
    return $queryItems;
  }
}