<?php
require_once "JWT.php";

/**
 * SoJWT short summary.
 *
 * SoJWT description.
 * @changes changes to JWT library:check comments start with override changes
 * @version 1.0
 * @author yanjunl
 */
class SoJWT extends JWT
{    
    /**
     * Decodes a JWT string into a PHP object.
     *
     * @param string      $jwt       The JWT
     * @param string      $certificatePath the path of the certificate
     * @param bool        $verify    Don't skip verification process
     *
     * @return object      The JWT's payload as a PHP object
     *
     * @throws DomainException              Algorithm was not provided
     * @throws UnexpectedValueException     Provided JWT was invalid
     * @throws SignatureInvalidException    Provided JWT was invalid because the signature verification failed
     * @throws BeforeValidException         Provided JWT is trying to be used before it's eligible as defined by 'nbf'
     * @throws BeforeValidException         Provided JWT is trying to be used before it's been created as defined by 'iat'
     * @throws ExpiredException             Provided JWT has since expired, as defined by the 'exp' claim
     *
     * @uses jsonDecode
     * @uses urlsafeB64Decode
     */
    public static function decode($jwt, $certificatePath = "", $verify = true)
    {
        $tks = explode('.', $jwt);
        if (count($tks) != 3) {
            throw new UnexpectedValueException('Wrong number of segments: ' . $jwt);
        }
        list($headb64, $bodyb64, $cryptob64) = $tks;
        if (null === ($header = JWT::jsonDecode(JWT::urlsafeB64Decode($headb64)))) {
            throw new UnexpectedValueException('Invalid header encoding');
        }
        
        // override changes: use standard json_decode
		$payload = json_decode(JWT::urlsafeB64Decode($bodyb64));	
        if (null === $payload) {
            throw new UnexpectedValueException('Invalid claims encoding');
        }
        // override changes end
        
        $sig = JWT::urlsafeB64Decode($cryptob64);
        if ($verify) {
            if (empty($header->alg)) {
                throw new DomainException('Empty algorithm');
            }
            
            // override changes: get key from certificate
            
            $key = SoJWT::getPublicKey($certificatePath);
            
            // override changes end
            
            if (is_array($key)) {
                if (isset($header->kid)) {
                    $key = $key[$header->kid];
                } else {
                    throw new DomainException('"kid" empty, unable to lookup correct key');
                }
            }

            // Check the signature
            if (!JWT::verify("$headb64.$bodyb64", $sig, $key, $header->alg)) {
                throw new SignatureInvalidException('Signature verification failed');
            }

            // Check if the nbf if it is defined. This is the time that the
            // token can actually be used. If it's not yet that time, abort.
            if (isset($payload->nbf) && $payload->nbf > time()) {
                throw new BeforeValidException(
                    'Cannot handle token prior to ' . date(DateTime::ISO8601, $payload->nbf)
                );
            }

            // Check that this token has been created before 'now'. This prevents
            // using tokens that have been created for later use (and haven't
            // correctly used the nbf claim).
            if (isset($payload->iat) && $payload->iat > time()) {
                throw new BeforeValidException(
                    'Cannot handle token prior to ' . date(DateTime::ISO8601, $payload->iat)
                );
            }

            // Check if this token has expired.
            if (isset($payload->exp) && time() >= $payload->exp) {
                throw new ExpiredException('Expired token');
            }
        }

        return $payload;
    }
    
    /**
     * Summary of getPublicKey
     * extract public key from certificate
     */
    public static function getPublicKey($certificatePath){
        $keycontent = file_get_contents($certificatePath);
        $x509RawChunked = chunk_split(base64_encode($keycontent), 64);
        $x509Text = '-----BEGIN CERTIFICATE-----' . "\n" . $x509RawChunked . '-----END CERTIFICATE-----';
        $x509Obj = openssl_x509_read($x509Text);
        $publicKey = openssl_pkey_get_public($x509Obj);
        return $publicKey;
    }
}
