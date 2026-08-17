<?php
namespace MyCompany\SellerModule\Plugin;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\RequestInterface;

class CorsPlugin
{
    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @var RequestInterface
     */
    protected $request;

    public function __construct(
        ResponseInterface $response,
        RequestInterface $request
    ) {
        $this->response = $response;
        $this->request = $request;
    }

    public function aroundDispatch(
        \Magento\Framework\App\FrontControllerInterface $subject,
        \Closure $proceed,
        \Magento\Framework\App\RequestInterface $request
    ) {
        $allowedOrigins = ['http://localhost:5173', 'http://127.0.0.1:5173', 'http://localhost:3000'];

        $httpOrigin = $this->request->getServer('HTTP_ORIGIN');
        if ($httpOrigin && in_array($httpOrigin, $allowedOrigins)) {
            $this->response->setHeader('Access-Control-Allow-Origin', $httpOrigin, true);
            $this->response->setHeader('Access-Control-Allow-Credentials', 'true', true);
            $this->response->setHeader('Access-Control-Max-Age', '86400', true);
        }

        if ($this->request->getMethod() == 'OPTIONS') {
            $requestMethod = $this->request->getServer('HTTP_ACCESS_CONTROL_REQUEST_METHOD');
            if ($requestMethod) {
                $this->response->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE', true);
            }

            $requestHeaders = $this->request->getServer('HTTP_ACCESS_CONTROL_REQUEST_HEADERS');
            if ($requestHeaders) {
                $headers = preg_replace('/[^a-zA-Z0-9,\- ]/', '', $requestHeaders);
                $this->response->setHeader('Access-Control-Allow-Headers', $headers, true);
            }

            $this->response->setHttpResponseCode(200);
            return $this->response; // Skip the rest of the dispatch process for OPTIONS
        }

        return $proceed($request);
    }
}
