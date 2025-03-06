import puppeteer from 'puppeteer';
import path from 'path';

async function generatePdf(html, outputFileName) {
    try {
        const browser = await puppeteer.launch();
        const page = await browser.newPage();
        await page.setContent(html);
        await page.pdf({ path: outputFileName, width: '210mm', height: '260mm' });
        await browser.close();
    } catch (error) {
        console.error('Puppeteer Error:', error);
        throw error;
    }
}

async function main() {
    try {
        const html = process.argv[2]; // Get the HTML from the 3rd argument
        const outputFileName = process.argv[3]; // Get the output file name from the 4th argument

        if (!html || !outputFileName) {
            console.error('Usage: node generate-pdf.js <html_content> <output_file_path>');
            process.exit(1);
        }

        await generatePdf(html, outputFileName);
        console.log('PDF generated successfully.');
    } catch (error) {
        console.error('Error in main:', error);
        process.exit(1);
    }
}

main();