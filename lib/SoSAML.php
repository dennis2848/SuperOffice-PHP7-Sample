<?php
/**
 * SoSAML short summary.
 *
 * SoSAML description.
 *
 * @version 1.0
 * @author yanjunl
 */
if(strcasecmp(phpversion(), "5.4") < 0) {
    echo "Wrong php version for SMAL";
    exit;
}

class SoSAML
{
    const RSA_SHA1 = 'http://www.w3.org/2000/09/xmldsig#rsa-sha1';
    const RSA_SHA256 = 'http://www.w3.org/2001/04/xmldsig-more#rsa-sha256';
    
    /**
     * Summary of decode
     * $saml saml content from post
     * return array of attributes included in $saml string
     */
    public static function decode($saml, $certificatePath){        
        $publicKey = SoSAML::getPublicKey($certificatePath);
        $xml = new SimpleXMLElement(base64_decode($saml)); 
        $signature = ((string)$xml->Signature->SignatureValue);        
        $samlAlg = $xml->Signature->SignedInfo->SignatureMethod[0]["Algorithm"][0];
        
        switch($samlAlg){
            case SoSAML::RSA_SHA256:
                $alg = OPENSSL_ALGO_SHA256;
                break;
            default:
                $alg = OPENSSL_ALGO_SHA1;
        }
        
        if(openssl_verify($xml, $signature, $publicKey, $alg) != 1){
            throw new Exception("Signature verify failed");
        }
        
        $attrs = array();
        foreach($xml->AttributeStatement->Attribute as $k=>$v){
            $attrs[(string) ($v[0]["Name"][0])] = (string) $v->AttributeValue;
        }
        return $attrs;
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
